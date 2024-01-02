pipeline {
    agent any


    stages {
         stage ('Build Docker Image'){
             steps{
                 script {
                     dockerapp = docker.build("jceleste/ngweb:latest", '-f ./Dockerfile ./ ')
                }
             } 
		}	
		stage ('Push Docker Image'){
            steps {
                script {
                    docker.withRegistry('https://registry.hub.docker.com','dockerhub'){
                        dockerapp.push("latest")
                    }
                }
            }
        }
		
		stage ('Pull Docker Image'){
            environment {
                tag_version = "${env.BUILD_ID}"
            }
            steps{
		     	script {
                    sh 'docker pull  jceleste/ngweb:latest'
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
				}
		     	script {
                    sh 'docker-compose stop'
				
				}
				script {
                 
					sh 'sudo docker-compose up'
				}
				
			}
           
        }
		
		
		
    }

}