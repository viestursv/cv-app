
DIRECTORY STRUCTURE
-------------------

      assets/             contains assets definition
      config/             contains application configurations
      controllers/        contains Web controller classes
      models/             contains model classes
      runtime/            contains files generated during runtime
      vendor/             contains dependent 3rd-party packages
      views/              contains view files for the Web application
      web/                contains the entry script and Web resources


REQUIREMENTS
------------

This project has been created with php8.1, composer, Docker Desktop, docker compose on windows using WSL2.
Make sure you have installed all of the necessary tools (above) before running this project.


INSTALLATION
------------

### Get the project from an Archive File or Github

Extract the archive sent via email or use link to my repository on github (https://github.com/viestursv/cv-app.git)

### Install with Docker

Open the terminal and cd into cv-app folder,

You might need to update your vendor packages. You can do that with the following command:
    
    docker-compose run --rm php composer update --prefer-dist

Start the container

    docker-compose up -d

The containers should be started, but you need to run migrations to create db tables before using the app,

Connect to the docker container by using the following command from cv-app folder:

    docker exec -it cv-web-app /bin/bash

Next run the following command to apply all migrations

    php yii migrate
    write 'y', to accept
    
Now you can access the application through the following URL:

    http://127.0.0.1:8000


Some thoughts:

New tables may be added to db by creating new migrations
The project would have been nicer with dynamically added form fields to manage the number of additional fields (education, employment....), but since this is mainly for php purposes I chose to leave only two options for every section, which in the end didn't result in the best front-end experience.

I used yii2 basic template for the structure of this project. I have worked only with the advanced template before, but it seemed a bit too much for a smaller project like this.




