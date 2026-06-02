document.addEventListener('DOMContentLoaded', () => {

    //to make the home page as default page
    const list = document.querySelectorAll('.list');
    const lists = document.querySelectorAll('.list');
    const sections = document.querySelectorAll('.section');

    function activeLink(){
        list.forEach((item) => item.classList.remove('active'));
        this.classList.add('active');
    }

    list.forEach((item) => item.addEventListener('click', activeLink));

    lists.forEach((item) => {
        item.addEventListener('click', () => {
            lists.forEach((el) => el.classList.remove('active'));
            item.classList.add('active');
            sections.forEach((sec) => sec.classList.remove('active-section'));
            const target = item.getAttribute('data-target');
            document.getElementById(target).classList.add('active-section');
        });
    });

    //this is for the registration page. since it has 2 pages (instruction and form)
    //proceed to form
    const reFormBtn = document.querySelector('[data-target="re-form"]');
    if(reFormBtn) {
        reFormBtn.addEventListener('click', () => {
            document.getElementById('re-main').style.display = 'none';
            document.getElementById('re-form').style.display = 'block';
        });
    }

    //back to 1st page of register
    const backBtn = document.getElementById('back-register');
    if(backBtn) {
        backBtn.addEventListener('click', () => {
            document.getElementById('re-form').style.display = 'none';
            document.getElementById('re-main').style.display = 'block';
        });
    }

});


function enableBrand(answer) {
    //this parts are for the conditions. purpose is to make their sub-condition visible
    if(answer.value == 'unemployed'){
        if(answer.checked){
            document.getElementById('unemploy').classList.remove('unempl');
        } else {
            document.getElementById('unemploy').classList.add('unempl');
        }
    }

    if(answer.value == 'others-unemployed'){
        document.getElementById('other-unemployment').classList.remove('other-unemployment');
    } else {
    document.getElementById('other-unemployment').classList.add('other-unemployment');
    }

    if(answer.value == 'Transport Worker'){
        if(answer.checked){
            document.getElementById('transport').classList.remove('tw');
        } else {
            document.getElementById('transport').classList.add('tw');
        }
    }

    if(answer.value == 'Natural Disaster Victims'){
        if(answer.checked){
            document.getElementById('members').classList.remove('disaster');
        } else {
            document.getElementById('members').classList.add('disaster');
        }
    }

    if(answer.value == 'Senior Citizen'){
        if(answer.checked){
            document.getElementById('senior').classList.remove('seniors');
        } else {
            document.getElementById('senior').classList.add('seniors');
        }
    }

    if(answer.value == 'PWD'){
        if(answer.checked){
            document.getElementById('pwd').classList.remove('pwdisability');
        } else {
            document.getElementById('pwd').classList.add('pwdisability');
        }
    }

    if(answer.value == 'PWD'){
        if(answer.checked){
            document.getElementById('options').classList.remove('options');
        } else {
            document.getElementById('options').classList.add('options');
        }
    }

    if(answer.value == 'Medical Assistance'){
        if(answer.checked){
            document.getElementById('hospital').classList.remove('hospitals');
        } else {
            document.getElementById('hospital').classList.add('hospitals');
        }
    }

    if(answer.value == 'Educational Assistance'){
        if(answer.checked){
            document.getElementById('education').classList.remove('educations');
        } else {
            document.getElementById('education').classList.add('educations');
        }
    }

    if(answer.value == 'Burial Assistance'){
        if(answer.checked){
            document.getElementById('burial').classList.remove('burial');
        } else {
            document.getElementById('burial').classList.add('burial');
        }
    }

    //subconditional to be visible
    if(answer.value == 'Visual Disability'){
        document.getElementById('eyes').classList.remove('EYES');
    } else {
    document.getElementById('eyes').classList.add('EYES');
    }

    if(answer.value == 'Hearing Disability'){
        document.getElementById('hear').classList.remove('HEAR');
    } else {
    document.getElementById('hear').classList.add('HEAR');
    }

    if(answer.value == 'Orthopedic Disability'){
        document.getElementById('limb').classList.remove('LIMB');
    } else {
    document.getElementById('limb').classList.add('LIMB');
    }

    if(answer.value == 'Intellectual Disability'){
        document.getElementById('intellect').classList.remove('INTELLECT');
    } else {
    document.getElementById('intellect').classList.add('INTELLECT');
    }

    if(answer.value == 'Psychosocial Disability'){
        document.getElementById('Psychosocial').classList.remove('Psychosocial');
    } else {
    document.getElementById('Psychosocial').classList.add('Psychosocial');
    }

    if(answer.value == 'Communication Disability'){
        document.getElementById('speech').classList.remove('speech');
    } else {
    document.getElementById('speech').classList.add('speech');
    }

    if(answer.value == 'Chronic Illnesses'){
        document.getElementById('chronic').classList.remove('chronic');
    } else {
    document.getElementById('chronic').classList.add('chronic');
    }

    if(answer.value == 'Other'){
        document.getElementById('other').classList.remove('other');
    } else {
    document.getElementById('other').classList.add('other');
    }

    if(answer.value == 'Medical Bill'){
        document.getElementById('bill').classList.remove('bill');
    } else {
    document.getElementById('bill').classList.add('bill');
    }

    if(answer.value == 'Provide Medicine/s'){
        document.getElementById('medicine').classList.remove('medicine');
    } else {
    document.getElementById('medicine').classList.add('medicine');
    }

    if(answer.value == 'Cash Medicine'){
        document.getElementById('cash').classList.remove('cash');
    } else {
    document.getElementById('cash').classList.add('cash');
    }

    if(answer.value == 'Medical Equipment/s'){
        document.getElementById('equipment').classList.remove('equipment');
    } else {
    document.getElementById('equipment').classList.add('equipment');
    }

}

//subconditional to be visible
function equipmentSelect(answer) {
    if(answer.value == 'other assistive devices'){
        document.getElementById('otherequipment').classList.remove('otherequipment');
    } else {
        document.getElementById('otherequipment').classList.add('otherequipment');
    }
}

//subconditional to be visible
function educationSelect(answer) {
  
    document.getElementById('tuition').classList.add('tuition');
    document.getElementById('supplies').classList.add('supplies');
    document.getElementById('loans').classList.add('loans');

    
    if(answer.value == 'Tuition'){
        document.getElementById('tuition').classList.remove('tuition');
    } else if(answer.value == 'School Supplies'){
        document.getElementById('supplies').classList.remove('supplies');
    } else if(answer.value == 'Student Loans'){
        document.getElementById('loans').classList.remove('loans');
    }
}

//status change color
function getStatus(status){
    if(status== 'Pending') return 'orange';
    if(status == 'Processing') return 'blue';
    if(status == 'Completed') return 'green';
    return 'black';
}



//searching of the reference ID/number
function searchID() {
    const id = document.getElementById("searchInput").value;
    const result = document.getElementById("result");

    if (!id) {
        alert("Please enter a Reference ID");
        return;
    }

    result.innerHTML = "<p>Searching...</p>";

    //connecting to the database
    fetch("searching.php", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: "id=" + id
    })
    .then(response => response.json())
    .then(data => {
        //outputs of the search
        if (!data.found) {
            result.innerHTML = `<p style="color:red;"> Reference ID not found.</p>`;
        } else {
            result.innerHTML = `
                <h3> Application Found!</h3>
                <p><strong>Name:</strong> ${data.name}</p>
                <p><strong>Status:</strong>
                    <span style="color: ${getStatus(data.status)}; font-weight: bold;">
                        ${data.status}
                    </span>
                </p>
                <p><strong>Condition:</strong> ${data.condition.join(", ")}</p>
                <p><strong>Response:</strong> ${data.response.join("<br><br>")}</p>
            `;
        }
        document.getElementById("searchInput").value = "";
    })
    .catch(error => {
        result.innerHTML = `<p style="color:red;">Error: ${error.message}</p>`;
        console.error("Error:", error);
    });
}

//function to update filename display
function updateFileDisplay(inputElement) {
    const display = inputElement.nextElementSibling;
    if (display) {
        if (inputElement.files.length > 0) {
            display.textContent = inputElement.files[0].name;
        } else {
            display.textContent = 'No file chosen';
        }
    }
}

document.getElementById('eamage').addEventListener('change', function(e){
    updateFileDisplay(e.target);
})

document.getElementById('bill_image').addEventListener('change', function(e){
    updateFileDisplay(e.target);
})

document.getElementById('medicine_image').addEventListener('change', function(e){
    updateFileDisplay(e.target);
})

document.getElementById('cash_image').addEventListener('change', function(e){
    updateFileDisplay(e.target);
})

document.getElementById('equipment_image').addEventListener('change', function(e){
    updateFileDisplay(e.target);
})

document.getElementById('tuition_image').addEventListener('change', function(e){
    updateFileDisplay(e.target);
})

document.getElementById('supplies_image').addEventListener('change', function(e){
    updateFileDisplay(e.target);
})

document.getElementById('certificate-image').addEventListener('change', function(e){
    updateFileDisplay(e.target);
})



