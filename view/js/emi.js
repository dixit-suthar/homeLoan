
function calculate() {
    var loanAmount = document.getElementById("amount").value;
    var interestRate = document.getElementById("interest").value;
    var loanDuration = document.getElementById("duration").value;
    
    var interestPerYear = (loanAmount * interestRate) / 100;
    var monthlyInterest = interestPerYear / 12;
    
    
    var monthlyPayment = monthlyInterest + (loanAmount / loanDuration);
    var totalInterestCost = monthlyInterest * loanDuration;
    var totalRepayment = monthlyPayment * loanDuration;
    
    
    document.getElementById('output').classList.remove("d-none");

    document.getElementById("monthly-interest").innerHTML = " &#8377; " + monthlyInterest.toFixed(2);
    document.getElementById("monthly-payment").innerHTML = " &#8377; " + monthlyPayment.toFixed(2);
    document.getElementById("total-repayment").innerHTML = " &#8377; " + totalRepayment.toFixed(2);
    document.getElementById("total-interest").innerHTML = " &#8377; " + totalInterestCost.toFixed(2);
}