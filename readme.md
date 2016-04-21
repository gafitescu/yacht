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


There are workers who see the job and take it , assess and based on the client notes
it assigns a task from the list of available tasks and start working on it so the 
status would be set in IN PROGRESS and this would be recorded in the
history table.
 
Let's say the yacht needs 2 things fix the wheel and a paint job , this would be 
mentioned in the request but it will need 2 tasks done on it 
so int he history would appear 2 records.
Once both tasks are completed the job will be set to COMPLETED and the
status of the yacht will be set to SAILING (can be delivered) also the next_maintenance_date
is going to be updated ( you can do this also based on the task completed if needed).



