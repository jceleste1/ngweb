pipeline {
    agent any


    stages {
         stage ('Build Docker Image'){
             steps{
                 script {
                     dockerapp = docker.build("jceleste1/ngweb:${env.BUILD_ID}", '-f ./negweb/Dockerfile ./home/negocios/public_html')
                }
             } 
	}

    }

}