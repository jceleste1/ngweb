pipeline {
    agent any


    stages {
         stage ('Build Docker Image'){
             steps{
                 script {
                     dockerapp = docker.build("jceleste/ngweb:${env.BUILD_ID}", '-f ./Dockerfile ./ ')
                }
             } 
		}	
		stage ('Push Docker Image'){
            steps {
                script {
                    docker.withRegistry('https://registry.hub.docker.com','dockerhub'){
                    dockerapp.push("${env.BUILD_ID}")
                    }
                }
            }
        }
		
		
		
		stage ('Down Docker Image'){
            environment {
                tag_version = "${env.BUILD_ID}"
            }
            steps{
		     	script {
                    sh 'cd /home/ngweb-compose'
					
					 sh 'docker rmi  jceleste/ngweb:${env.BUILD_ID}'
					
					sh 'docker-compose up'


				}
				
			}
           
        }
		
		
		
    }

}