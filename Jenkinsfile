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
		
		stage ('Deploy dcoker'){
            environment {
                tag_version = "${env.BUILD_ID}"
            }
            steps{
                    sh 'docker pull  jceleste/ngweb:"/$tag_version"
                }
            }
        }


		
		
		
		
		
		
		

    }

}