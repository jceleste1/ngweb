pipeline {
    agent any
	
	environment { 
        registry = "jceleste/ngweb" 

        dockerImage = '' 
    }


    stages {
         stage ('Build Docker Image'){
             steps{
                 script {
				       sh 'docker system prune -a'
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
		
		
		
		stage ('Publish Docker Image'){
            environment {
                tag_version = "${env.BUILD_ID}"
            }
            steps{
		     	script {
              
					
					sh 'sed -i "s/{{TAG}}/$tag_version/g" /home/ngweb-compose/docker-compose.yaml'
                    sh 'docker-compose build'
					
 sh 'docker compose up  '

				}
				
			}
           
        }
		
		
		
    }

}