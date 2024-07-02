paymentForm.addEventListener("submit", makePayment, false);

function makePayment(e) {
  e.preventDefault();

  let handler = PaystackPop.setup({
    key: 'pk_test_79c177b5d6ef026f61c49c74393eb343fd6c7db4', // Replace with your public key
    email: document.getElementById("email").value,
    amount: document.getElementById("amount").value * 100,
    ref: document.getElementById("ref").value, // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
    // label: "Optional string that replaces customer email"
    onClose: function(){
      alert('Window closed.');
      Swal.fire({
          icon: 'warning',
         title: 'Canceled',
         text: 'Transaction was canceled'
      });
    },
    callback: function(response){
      $.post("core/verify.php", {reference:response.reference}, function(data){
           alert(data);
         });
    }
  });

  handler.openIframe();
}



