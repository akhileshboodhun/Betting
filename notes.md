# Horse Betting Notes
>![Horse Image](/res/images/393226.jpg)

## TO DO

Admin login plus Users normal login/logout{
    plis imp zfr ti fini ffaire
  implement php validation
implement JS validation at password and confirm password
  


when user sign in it should display user's balance in NAV BAR...(get balance from database)



Admin managmenet page where atleast admin has a form to add a race using a form.
The form design was already discussed...it should be simple like in class..

/*If we complete these 2 points below then we shoul be stressfree*/
----------------------------------------------------------------------
Before last thing to do(Will always stay before last even if list gets longer)
Create another race(RACE 6) this one will not be like the others where 
the names are on the php file... this one will get names from DB

ADD two other columns to the race table and add the odd and add the bet button in the respective column..

The last thing will be to save a bet to the database

--------------------------------------------------------------------------------------------

```php
<?php
/* Execute a prepared statement by binding PHP variables */
$calories = 150;
$colour = 'red';
$sth = $dbh->prepare('SELECT name, colour, calories
    FROM fruit
    WHERE calories < ? AND colour = ?');
$sth->bindParam(1, $calories, PDO::PARAM_INT);
$sth->bindParam(2, $colour, PDO::PARAM_STR, 12);
$sth->execute();
?>

<?php
$stmt = $this->pdo->prepare("SELECT COUNT(*) FROM users WHERE email=:email");
$stmt->bindParam(":email", $_POST['email']);
$stmt->execute();
$stmt->fetch(PDO::FETCH_ASSOC);
?>

//bindparam and bindParam works differently
```

NEW COMMENTS 
===================================================

``` session_start();``` on register ( auto login upon registration)

```mysql date format yyyy/mm/dd      //need conversion   //fixed```
```sql
INSERT INTO horse 
VALUES (845,"lola",  
DATE_FORMAT(STR_TO_DATE("26/04/1999",'%d/%m/%Y'), '%Y/%m/%d')   ,78,213)        //fixed
```

><strong>changed field names. need to modify php sql codes where referenced</strong>

```race_id, horse_id, jockey_id``` makes a combined primary key 


## TO DO:
>```Prerequisites: create views for race details```
>>1. insert races manually ( populate table)
>>2. write functions to place bets
>>3. place a bet and test if it works (simple gui)
>>4. develop admin dashboard( add races, etc..)
>>5. admin ability to cancel bet
>>6. refund bets upon cancellation

# Made by Akhilesh Boodhun