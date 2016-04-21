# Yacht management

## Initial setup

1. Clone the project  
2. composer install
2. Copy .env.example to .env file and make the specific changes on the database
3. php artisan migrate 
4. php artisan db:seed


## Workflow

 There way I see the workflow is having a reception/customer support that talk to the 
customer over the phone and receive the yacht and take notes on what needs to be done.

The fill in a job (request) . 
The request has multiple statuses 
- NEW - when the yacht is received 
- IN PROGRESS - when works is done on the yacht
- COMPLETED - when the work is done and the client pick up the yacht

Once the request has been filled it has the status = NEW.

![Add job](https://www.evernote.com/shard/s64/sh/571318a7-ba8d-4298-8fff-5edd7afeacec/44dd659bb9f5a265/res/74a88657-d1d1-4c35-b90c-d3a4a3fbcb87/skitch.png "Add job")

There is a job/requests that needs to be handle and it sorted in such a way that new tasks are up top ,
and the completed are last and sorted descending by time.
![Job listing](https://www.evernote.com/shard/s64/sh/4224fd11-c9eb-4601-9272-e0ab12c0eccb/e75d909488280698/res/11ad5c91-8d5e-4cef-97b6-6f2c79a7def4/skitch.png "Job listing")


There are company workers who see the job and take it , assess and based on the client notes
it assigns a task from the list of available tasks and start working on it so the 
status would be set in IN PROGRESS and this would be recorded in the
history table.
![Job assignment](https://www.evernote.com/shard/s64/sh/2da22f06-5c8a-430a-a006-80d62ccfc50d/e0aec5e32929684d/res/204b3b52-de3e-4248-97b9-2f9972bd7c87/skitch.png "Job assignment")


Here this can be extended and add worker id to see who did the job and track working hours on it if needed in future.
 
Let's say the yacht needs 2 things fix the wheel and a paint job , this would be 
mentioned in the request but it will need 2 tasks done on it 
so int he history would appear 2 records.
Once both tasks are completed the job will be set to COMPLETED and the
status of the yacht will be set to SAILING (can be delivered) also the next_maintenance_date can be
specified so that will be updated.

![Job completed](https://www.evernote.com/shard/s64/sh/af6ce281-4ce1-44e0-be3b-118d5f502451/bb4d35a91482ba13/res/32c5bd90-002c-4a10-a8cb-a7aa500ef7aa/skitch.png "Job completed")
In the example above the 2 tasks were done on the yacht at the client request so now I will set that
the next maintenance date will be needed.


The management can see the activity by clicking the Last activity where they can see what task has
been completed
![Latest activity](https://www.evernote.com/shard/s64/sh/5db3de43-2993-4430-90bf-686c21bc19b9/a1af9ddb34982987/res/13867178-d915-4b10-9c02-158cd385e693/skitch.png "Latest activity")

From a DB stand point we have a history table here:

- id PK 
- job_id  FK to jobs table
- task_id FK to the tasks table
- timestamps


The management can also list the clients on the **Clients** tab and here can be extended to a CRUD
where the manager can add client name and contact phone and email address.
I have implemented events for every task completed so we can have listeners that will email the client
to the progress on his/her yacht.
![Client listing](https://www.evernote.com/shard/s64/sh/17f8ca8c-58f3-45a8-9af4-b630f34f3c31/67bd8f0a2581db55/res/f25b02b2-935b-4b6b-a1e9-175bd1c7c1f7/skitch.png "Client listing")

From a DB stand point we have a very basic information on the client and the way we can contact him/her
- id - PK
- first_name 
- last_name
- email
- phone 
- timestamps


Management can defined tasks as well and have a CRUD where they can define predefined tasks that 
will be handled on the yacht , fox example : repaint , install gps , system checks and so one
![Task listing](https://www.evernote.com/shard/s64/sh/e0e0d401-64c0-4b75-b226-e5d7534389a8/ffa4e931353425c2/res/97b7e83b-eb8b-4ae0-a64b-92f5bda98e19/skitch.png "Task listing")


From a DB stand point we have :

- id PK
- code (is an internal task code that used by the management & workers)
- status ( they are categorized in 'CHECKING','UPGRADING','UNDER_REPAIR' so they can be easier filtered and also update the yacht status based on this)
- name ( name of the task that can appear on a invoice if needed
- description (short description on what's done during this task)
- average_duration - can be used to calculate how much time it takes for a worked to completed it 
and have it used if needed in time sheets
- timestamps


Yacht management you can add a new yacht and assign it to a already created customer and also 
see the history of all the jobs/request done by the company

![Yacht management](https://www.evernote.com/shard/s64/sh/58d5c8d8-5c7f-4ac3-9552-87f3ca5d46de/122639ce86dfe5f4/res/417eafd6-863e-4ff6-a9ab-71af10a94414/skitch.png "Yacht management")


From a DB stand point we have :

- id PK
- client_id PK to the clients table
- status ( they are categorized in 'SAILING','CHECKING','UPGRADING','UNDER_REPAIR' and you can add more)
- name ( name of the boat )
- registration_code (as far as I know every boat need a registration code which is unique)
- next_maintenance_date - next maintenance date set after every time (if needed) by the company workers after the jobs are done
- timestamps



Yacht history

![Yacht history](https://www.evernote.com/shard/s64/sh/31723797-ce50-4619-876b-17a2c3d56ce8/9b54cc0303a1b160/res/abb34d63-f643-4ab3-b6f1-2882f7306c16/skitch.png "Yacht history")









