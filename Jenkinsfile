pipeline {
  agent any

  stages {
    stage('Deploy via SSH') {
      steps {
        withCredentials([
          string(credentialsId: 'vps-host', variable: 'VPS_HOST'),
          string(credentialsId: 'vps-username', variable: 'VPS_USERNAME'),
          string(credentialsId: 'vps-port', variable: 'VPS_PORT'),
          string(credentialsId: 'vps-project-path', variable: 'VPS_PROJECT_PATH'),
          string(credentialsId: 'vps-deploy-branch', variable: 'DEPLOY_BRANCH')
        ]) {
          sshagent(credentials: ['vps-ssh-key']) {
          sh '''
            set -eu

            for required_var in VPS_HOST VPS_USERNAME VPS_PORT VPS_PROJECT_PATH DEPLOY_BRANCH; do
              if [ -z "$(eval "printf '%s' \"\\${$required_var}\"")" ]; then
                echo "Missing required Jenkins credential value: $required_var"
                exit 1
              fi
            done

            ssh -o ConnectTimeout=15 -o StrictHostKeyChecking=no -p "$VPS_PORT" "${VPS_USERNAME}@${VPS_HOST}" "bash -se -- '${VPS_PROJECT_PATH}' '${DEPLOY_BRANCH}'" <<'EOF'
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
}
