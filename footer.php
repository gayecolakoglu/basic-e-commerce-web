
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		<script src="Hw.js"></script>

		<!-- script code for user update password,checkbox (account)-->
		<script>
		$("#check").click(function(){
			var x = document.getElementById("hiddenPart");
			if(x.style.display === "none") {
				x.style.display = "block";
			} else {
				x.style.display = "none";
			}
		});
		</script>

		<!-- script code for admin.php(make block choosen one, make hidden others) -->
		<script>
			var formArray = ["add" ,"update", "delete", "createAdmin","cancelOrder"];
			$("input[name='actionGroup']").on("change", function(){
				for(var i in formArray){
					if(formArray[i] === $(this).val()){
						//We get forms by using  value of input (formArray[i]) which is id of forms
						var x = document.getElementById(formArray[i]);
						x.style.display = "block";
					}else{
						var x = document.getElementById(formArray[i]);
						x.style.display = "none";
					}
				}
			});
		</script>

		<?php $conn->close();?>
  </body>
</html>