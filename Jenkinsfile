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
					
                    }
                }
            }
        }
		
		
		
		stage ('Deploy Docker Image'){
          
            steps{
		     	script {
					sh 'sed -i "s/{{TAG}}/$tag_version/g" /home/ngweb-compose/docker-compose.yaml'
                    sh 'docker-compose start'
					
					sh 'sed -i "s/$tag_version/$tag_generic/g" /home/ngweb-compose/docker-compose.yaml'
				}
				
			}
           
        }
		
		
		
    }

}