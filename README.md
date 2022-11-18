# Uber App 

That application uses PEST as test runner. 

### To launch test without coverage report: 

```./vendor/bin/pest```

### To launch test with coverage report:

```./vendor/bin/pest --coverage```

## User Story 

As a traveler   
I want to book a trip with Uber   
So that I can move right now and quickly 

## Acceptance Criteria

- From Paris to Outside, a trip costs 50€
- From Outside to Paris, a trip costs 0€ 
- Intramuros, a trip costs 30€
- The traveler must have enough money to pay his trip
- 1 in 6 chance, the traveler can obtain a discount of 20€ for the current trip

