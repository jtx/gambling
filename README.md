# dev-codetest
Gambling.com Group Dev Code Test

The JSON-encoded affiliates.txt file attached contains a shortlist of affiliate contact records - one per line.

We want to invite any affiliate that lives within 100km of our Dublin office for some food and drinks using this text file as the input (without being altered).

##Task
Write a program that will read the full list of affiliates from this txt file and output the name and IDs of matching affiliates within 100km, sorted by Affiliate ID (ascending).

You can use the first formula from this [Wikipedia article](https://en.wikipedia.org/wiki/Great-circle_distance) to calculate distance. Don't forget, you'll need to convert degrees to radians.

The GPS coordinates for our Dublin office are 53.3340285, -6.2535495.

You can find the affiliate list in this repository called affiliates.txt.

Please don’t forget, your code should be production ready, clean and tested!

## Requirements
- Use of Laravel
- Basic HTML & CSS output
- Demonstrate understanding of MVC

## Nice to haves:
- Use of [TailwindCSS](https://tailwindcss.com/)
- Use the original txt file as input
- Unit Tests
- Responsive Web Design (desktop and mobile)
- SEO best practice
