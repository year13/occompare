# Occompare

An application to compare two selected occupations in terms of Skills using ONET data.

The repository contains a Laravel and Nuxt bootstrapped application for your convenience. The parser service (App\Service\OnetOccupationParser) has been implemented to return a list of core skills along with their importance percentage value from ONET for a given occupation. Spend some time to get yourself familiarised with the data. You are expected to develop an application with a simple matching algorithm that shows the similarity score between two selected occupations, in percentage value. We also expect you to come up with a functional front-end to pair up with the matching algorithm to display the results in a meaningful way.

The aim of this exercise is NOT to come up with the best algorithm but for us to gauge your skills throughout the stack. Cover as much as you can, leave comments for unfinished implementations or improvements you couldn't make due to lack of time. Its okay if you want to put more efforts onto back-end or front-end, if thats what you feel your strength is.

Feel free to add any of your own touches, library upgrades, containerisation etc. If you're not familiar with Vue on the frontend, feel free to use React.

Don't feel the need to spend too much time on this - we don't expect more than a few hours of work, but keep track of any improvements or further features you would add if you had more time.

## Submission Criteria
Depending on what kind of role you're applying for, we'll assess the following:

### All Submissions
- Your coding practices, standards, and architecture
- Performance optimisations throughout the application
- Any fixes / improvements to the existing bootstrapped code
- We DO NOT expect you to write any tests.
- We will NOT ask you to make revisions following the assessment.

### Frontend Submissions

- Overall layout, responsiveness and accessibility
- Component design and structure
- Adherence to vue/react best practices
- Visual presentation of the data
- Shortlist / Save occupation functionality (cookie/local storage based)
- Don't worry too much about the algorithm implementation

### Backend Submissions

- Database layer (migrations / seeders / models / relations)
- Strategies to store and cache needed data
- The efficiency of the algorithm
- Adherence to laravel best practices
- You are free (and encouraged) to make any changes required to the provided bootstrap and the UI layout. Showcase your skills anyway you see fit.

### Full Stack Submissions

- We'll assess you on both the frontend and backend criteria
- Feel free to focus on one side of the application more than the other to showcase your strengths

## Setup

You'll need to have docker and docker-compose installed as a prerequisite

```
git clone git@github.com:year13/occompare.git
cd occompare
docker-compose up

# wait a few minutes for BE / FE dependencies to install

# You will see 'DEPENDENCIES READY' in the docker output when this is done

# Visit http://localhost to see the bootstrapped application
```

## How to submit

Upload your work to a git repository and invite us into the repo. We need to be able to download the repository. Please make sure the repo is private.
Please add these emails to your repo:

- fahad@year13.com.au
- kenneth@year13.com.au
- mark@year13.com.au

It would also be great if you can also write up an outline about your thought process behind the code (and what you would do differently if you had more time).

## What to expect after your submission

We will review your code and either send you a written feedback or invite you to discuss your submission with a team member. We will discuss what we liked, what could've been better and also some "what if" scenarios.
