pipeline {
  agent any

  parameters {
    string(name: 'VPS_HOST', defaultValue: '', description: 'VPS IP or hostname that Jenkins can reach')
    string(name: 'VPS_USERNAME', defaultValue: 'deploy', description: 'SSH user with deploy privileges')
    string(name: 'VPS_PORT', defaultValue: '22', description: 'SSH port (usually 22)')
    string(name: 'VPS_PROJECT_PATH', defaultValue: '/var/www/app', description: 'Location of the Laravel project on the VPS')
  }

  environment {
    DEPLOY_BRANCH = 'master'
  }

  stages {
    stage('Checkout') {
      steps {
        checkout scm
      }
    }

    stage('Deploy via SSH') {
      when {
        expression { params.VPS_HOST?.trim() }
      }
      steps {
        withCredentials([string(credentialsId: 'vps-password', variable: 'VPS_PASSWORD')]) {
          sh '''
            set -eu

            if ! command -v sshpass >/dev/null 2>&1; then
              echo "sshpass is required for password-based SSH. Install it inside the Jenkins agent image."
              exit 1
            fi

            sshpass -p "$VPS_PASSWORD" ssh -o StrictHostKeyChecking=no -p "$VPS_PORT" "${VPS_USERNAME}@${VPS_HOST}" "bash -se -- '${VPS_PROJECT_PATH}' '${DEPLOY_BRANCH}'" <<'EOF'
              set -eu

              VPS_PROJECT_PATH="$1"
              DEPLOY_BRANCH="$2"

              cd "${VPS_PROJECT_PATH}"

              git fetch origin ${DEPLOY_BRANCH}
              git checkout ${DEPLOY_BRANCH}
              git pull origin ${DEPLOY_BRANCH} --ff-only

              if [ -f composer.json ]; then
                composer install --no-interaction --no-dev --prefer-dist --optimize-autoloader
              fi

              if [ -f artisan ]; then
                php artisan optimize:clear
                php artisan optimize
              fi

              if [ -f package-lock.json ]; then
                npm ci
                npm run build
              fi
EOF
          '''
        }
      }
    }
  }
}
