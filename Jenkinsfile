pipeline {
    agent any
	
	environment { 
        registry = "jceleste/ngweb" 
        dockerImage = '' 
		tag_version = "${env.BUILD_ID}"		
		tag_generic  =  '{{TAG}}'
    }


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
                    docker.withRegistry('https://registry.hub.docker.com/','dockerhub'){
                     dockerapp.push("${env.BUILD_ID}")
					  dockerapp.push("latest")
                    }
                }
            }
        }
		
		
		stage ('Deploy Docker Image'){
            steps{
		     	script {
				
					try {
						sh 'docker stop ngweb_ngwebsite_1'
					} catch (err) {
						echo err.getMessage()
						echo ">>>> Error docker stop."
					}
					try {
						sh 'docker rm ngweb_ngwebsite_1'
						sh 'docker rmi -f jceleste/ngweb:latest'
					} catch (err) {
						echo err.getMessage()
						echo ">>> Erro  docker rm."
					}          
				               
                    sh 'docker-compose up -d'
				}
				
			}
           
        }
		
		
    }

}