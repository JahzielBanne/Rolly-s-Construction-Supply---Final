<h3>Provide the Required Information</h3>
<div id="form-block">
    <form onsubmit="return Checkclient()" name="client" method="POST" action="processes/process.client.php?action=new">
        <div id="form-block-center">
            <label for="name">Client Name</label>
            <input type="text" id="name" class="input" name="name" placeholder="Client Name..">

            <label for="address">Address</label>
            <textarea id="address" class="input" name="address" placeholder="Address"></textarea>
            
            <label for="number">Mobile Number</label>
            <input type="text"id="number" class="input" name="number" placeholder="Mobile Number.."/>
        
              </div>
        <div id="button-block">
        <input type="submit" value="Create">
        </div>
  </form>
</div>
<script>
    function Checkclient() {
        let cname = document.client.name.value;
        let address = document.client.address.value;
        let number = document.client.number.value;

        if (cname === "" || address === "" || number === "") {
            alert("Please fill out the form!");
            return false;
        } else {
            return true;
        }
    }
</script>