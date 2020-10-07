#Introduction

This project collects and processes statistical data from pre-configured hosts, servers and third-party services.

#Installation

Clone the repo

`git clone https://github.com/webmaster-z1lab/heimdal.git`

Install composer

`composer install`

Set .env variables

`cp .env.example .env`

Run migrations

`php artisan migrate`

Run the dev server

`php artisan serve`

#How it works?

This server works with preconfigured commands that periodically check the health of the hosts, the resource consumption of the servers and the status of third-party services.

The checks of the hosts are stored in a unit and if an error is detected an incident is generated. This incident will be linked to the next failed checks from that same host until a successful response is verified and from that point on, the incident will be closed. An incident with 5 consecutive failures should trigger notifications for previously configured services.

The consumption data of the servers are stored separately to create the hardware consumption history and generate alerts if necessary. Whenever a resource remains above 90% for more than 5 checks, a notification will be triggered.

The third-party services have their simplest verification, the verification is performed only to verify whether they respond or not and in case of failure for more than 5 attempts the status is set to offline until the next attempt and a notification must be sent.

In the future, this package will include a complete API for realtime dashboard management and monitoring.

### *This docs are under development*
