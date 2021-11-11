

# Malong interview test
------------

### General Notes
`USER MODEL` was used to designate a business in this application
------------

Demo
------------
Demo is at [Show me demo](#)

Install
------------
- clone this project
- Run `composer update` __NB__ : Make sure you have _Composer_ installed on your local machine
- rename `.env.example` to `.env` and fill in your database credentials to establish connection and aws-s3-bucket for files storage
- Seed databse with test given data by running `php artisan db:seed:`
- Start application by running `php artisan serve`
- and you are good to go

Endpoints/ description
------------
* A Business should have the ability to create, update and delete a job.
    - POST - http://127.0.0.1:8000/api/jobs - create job
    - PUT - http://127.0.0.1:8000/api/jobs/{id} - update job
    - DELETE - http://127.0.0.1:8000/api/jobs/{id} - Delete job
* A Guest Should be able to browse through a List of Jobs
    - GET - http://127.0.0.1:8000/api/jobs - Get all Job  _upgrade : Result should be paginated in case of large volume of data_
* A Guest Should be able to view and apply for a Job
    - GET - http://127.0.0.1:8000/api/jobs/{id}
    - POST - http://127.0.0.1:8000/api/jobs/apply
* A Guest can search for a Job
    - GET - http://127.0.0.1:8000/api/jobs/search?job_title=php/laravel-developer&&type_id=1&&category_id=1&&condition_id=1 _NB: only `job_title` is the required parameter_
* A Business can see a list of jobs they created
    - GET - http://127.0.0.1:8000/api/business/dashboard
* A Business can Login
    - POST - http://127.0.0.1:8000/api/login __NB: Business can log in to their account only with email and password__
    - POST - http://127.0.0.1:8000/api/register , A new business account can be registered__NB : important parameters are _name_, _email_ , _*business_name*_, _password_


Test
------------
A simple feature test was written for the authentication routes
   - Run artisan command `php artisan test` __NB: Additional test can be written into the application__


### Design Pattern - service-repository design pattern
    #### controller -> Service(business logic) -> Repositories
