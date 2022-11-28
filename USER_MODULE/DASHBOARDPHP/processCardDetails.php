<?php
session_start();
require_once("../PHP/phpMethods.php");

function validateCard(){
  checkCardHolder();
}

function checkCardHolder(){
  $array = str_split($_POST['cardHolder']);
  $letterCounter = 0;
  $nameCounter = 0;
  $myCardHolderString = array();
  foreach ($array as $char) {
    if(ctype_alpha($char)){
      array_push($myCardHolderString, $char);
      $letterCounter++;
      continue;
    } else{
      if($char == ' ' && $letterCounter>=2){
        array_push($myCardHolderString, $char);
        $letterCounter = 0; $nameCounter++;
        continue;
      } elseif($char == ' ' && $letterCounter>=1){
        array_push($myCardHolderString, $char);
        $letterCounter = 0; $nameCounter++;
        continue;
      } else{
        echo("<script>
          window.location.href='../DASHBOARD/paymentMethods.php';
          alert('Enter a valid card holder name.');
          </script>");
      }
    }
  }
  $reversedArr = array_reverse($myCardHolderString);
  if($nameCounter<1){
    echo("<script>
      window.location.href='../DASHBOARD/paymentMethods.php';
      alert('Enter the full card holder name. No single names are allowed.');
      </script>");
  } elseif($reversedArr[0] == ' '){
    echo("<script>
      window.location.href='../DASHBOARD/paymentMethods.php';
      alert('Remove any whitespaces at the end of your cardholder name');
      </script>");
  } elseif($reversedArr[1] == ' ' && ctype_alpha($reversedArr[0])){
    echo("<script>
      window.location.href='../DASHBOARD/paymentMethods.php';
      alert('Enter a valid card holder last name. No abbreviations are allowed.');
      </script>");
  } else{
    checkCCN();
  }
}

function checkCCN(){
  $array = str_split($_POST['ccn']);
  $ccnCounter = 0;
  $ccnArr = array();
  foreach ($array as $char) {
    if(intval($char)>=0 && $char!="_"){
      array_push($ccnArr, $char);
      $ccnCounter++;
      continue;
    } elseif($char==" "){
      continue;
    } elseif($char=="_"){
      array_push($ccnArr, $char);
      break;
    } else{
      echo("<script>
        window.location.href='../DASHBOARD/paymentMethods.php';
        alert('Enter a valid card number.');
        </script>");
      break;
    }
  }
  $reversedCCNArr = array_reverse($ccnArr);
  if($ccnCounter<16){
    echo("<script>
      window.location.href='../DASHBOARD/paymentMethods.php';
      alert('Card number digits less than the standard.');
      </script>");
  } else{
    if($reversedCCNArr[0] == '_'){
      echo("<script>
        window.location.href='../DASHBOARD/paymentMethods.php';
        alert('Enter a valid card number. Card number digits less than the standard.');
        </script>");
    } else{
      checkValidity();
    }
  }
}

function checkValidity(){
  $array = str_split($_POST['validity']);
  $validityCounter = 0;
  $validityArr = array();
  $givenMonth = array();
  $givenYear = array();
  foreach ($array as $char) {
    if(intval($char)>=0 && $char!="/" && $char!="_"){
      array_push($validityArr, $char);
      if(sizeof($givenMonth)>=2){
        array_push($givenYear, $char);
      } else{
        array_push($givenMonth, $char);
      }
      $validityCounter++;
      continue;
    } elseif($char=="/"){
      continue;
    } elseif($char=="_"){
      array_push($validityArr, $char);
      break;
    } else{
      echo("<script>
        window.location.href='../DASHBOARD/paymentMethods.php';
        alert('Check your card validity date.');
        </script>");
      break;
    }
  }
  $reversedValidityArr = array_reverse($validityArr);
  if($validityCounter<4){
    echo("<script>
      window.location.href='../DASHBOARD/paymentMethods.php';
      alert('Card validity date is not to standards.');
      </script>");
  } else{
    if($reversedValidityArr[0] == '_'){
      echo("<script>
        window.location.href='../DASHBOARD/paymentMethods.php';
        alert('Enter a proper validity date. Validity date digits less than the standard.');
        </script>");
    } else{
      $monthFormatted = $givenMonth[0].$givenMonth[1];
      $givenMonthNum = intval($monthFormatted);
      $yearFormatted = '20'.$givenYear[0].$givenYear[1];
      $givenYearNum = intval($yearFormatted);
      if($givenYearNum < date('Y')){
        echo("<script>
          window.location.href='../DASHBOARD/paymentMethods.php';
          alert('Given card is not valid. Please try again or consult your bank.');
          </script>");
      } elseif($givenYearNum > (date('Y')+3)){
          echo("<script>
            window.location.href='../DASHBOARD/paymentMethods.php';
            alert('Given card validity date is invalid. Please check its details.');
            </script>");
      } elseif($givenYearNum == date('Y')){
          if($givenMonthNum <= date('m') && $givenMonthNum > 0){
            echo("<script>
              window.location.href='../DASHBOARD/paymentMethods.php';
              alert('Given card is expired. Please try another card.');
              </script>");
          } elseif($givenMonthNum > 12 || $givenMonthNum <= 0){
              echo("<script>
                window.location.href='../DASHBOARD/paymentMethods.php';
                alert('Month is not valid.');
                </script>");
          } else{
            checkCVV();
          }
      } elseif($givenYearNum == (date('Y')+3)){
          if($givenMonthNum > date('m')){
            echo("<script>
              window.location.href='../DASHBOARD/paymentMethods.php';
              alert('Given card is not valid. Please try again.');
              </script>");
          } elseif($givenMonthNum <= 0){
            echo("<script>
              window.location.href='../DASHBOARD/paymentMethods.php';
              alert('Month is not valid.');
              </script>");
          } else{
            checkCVV();
          }
      } else{
          if($givenMonthNum > 12 || $givenMonthNum <= 0){
            echo("<script>
              window.location.href='../DASHBOARD/paymentMethods.php';
              alert('Given card is not valid. Please try again or consult your bank.');
              </script>");
          } else{
            checkCVV();
          }
      }
    }
  }
}

function checkCVV(){
  $array = str_split($_POST['CVV']);
  $cvvCounter = 0;
  $cvvArr = array();
  foreach ($array as $char) {
    if(intval($char)>=0 && $char!="_"){
      array_push($cvvArr, $char);
      $cvvCounter++;
      continue;
    } elseif($char=="_"){
      array_push($cvvArr, $char);
      break;
    } else{
      echo("<script>
        window.location.href='../DASHBOARD/paymentMethods.php';
        alert('Check your card CVV.');
        </script>");
      break;
    }
  }
  if($cvvCounter<3){
    echo("<script>
      window.location.href='../DASHBOARD/paymentMethods.php';
      alert('Card CVV is not to standards.');
      </script>");
  } else{
    $reversedCVVArr = array_reverse($cvvArr);
    if($reversedCVVArr == '_'){
      echo("<script>
        window.location.href='../DASHBOARD/paymentMethods.php';
        alert('Card CVV is invalid.');
        </script>");
    } else{
      storeCard();
    }
  }
}

function storeCard(){
  $varUserID = $_SESSION['userID'];
  $varCardHolder = $_POST['cardHolder'];
  $varCCN = $_POST['ccn'];
  $varValidity = $_POST['validity'];
  $varCVV = $_POST['CVV'];

  $sql="SELECT * FROM tbl_user_card_sessions where userID = '".$varUserID."'";
  $result = getData($sql);
  if(!empty($result)){
    $sql_update = "UPDATE tbl_user_card_sessions SET cardHolder = '$varCardHolder', CCN = '$varCCN', validity = '$varValidity', CVV = '$varCVV' WHERE userID = '$varUserID'";
    setData($sql_update);
    echo("<script>
      window.location.href='../DASHBOARD/paymentMethods.php';
      alert('Card details updated successfully.');
      </script>");
  } else{
    echo("<script>
      window.location.href='../DASHBOARD/paymentMethods.php';
      alert('Error inserting card data.');
      </script>");
  }
}

if(!empty($_POST['cardHolder']) && !empty($_POST['ccn']) && !empty($_POST['validity']) && !empty($_POST['CVV'])){
  validateCard();
} else{
    echo("<script>
      alert('Please fill out all fields to proceed.');
      </script>");
    }

 ?>
