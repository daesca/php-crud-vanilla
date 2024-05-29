document.addEventListener("DOMContentLoaded", function(){

    function fetchCars(){
        fetch("src/handlers/readhandler.php")
        .then(response => response.json()
        .then(data => {
            let tableBody = document.getElementById("showCars");
            tableBody.innerHTML = "";
            data.forEach(car => {
                const carRow = document.createElement("tr");
                carRow.innerHTML = `
                    <td>${car.id}</td>
                    <td>${car.name}</td>
                    <td>${car.date_registration}</td>
                    <td><button data-id-car="${car.id}">${car.id}</button></td>
                
                `;
                tableBody.appendChild(carRow);
            });
        })
        .catch(error => console.log(error))
    );
    }

    fetchCars();

    const addCarForm = document.getElementById("formCars");

    addCarForm.addEventListener("submit", function(event){

        event.preventDefault();
        const formData = new FormData(addCarForm);

        fetch("src/handlers/createhandler.php", {  
            method: "POST",
            body: formData
        })
        .then(response => response.json())
        .then(data => {
           if(data.success){
            fetchCars();
            addCarForm.reset();
           } 
           else{
            console.log(data.success);
           }
        }).catch(error => console.log("error: ", error));

    });

    document.querySelector("#showCars").addEventListener("click", function(event){
        if(event.target && event.target.nodeName == "BUTTON"){
            //console.log(event.target.attributes[0].value);
            const id = event.target.innerHTML;
            deleteCar(id)
        }
    });

    function deleteCar(id){

        if(window.confirm("¿Desea eliminar este vehiculo?")){
            fetch("src/handlers/deletehandler.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded"
                },
                body:"id=" + encodeURIComponent(id)
            })
            .then(response => response.json())
            .then(data => {
               if(data.success){
                fetchCars();
               } 
               else{
                console.log(data.success);
               }
            }).catch(error => console.log("error: ", error));
        }
    
    }

});
