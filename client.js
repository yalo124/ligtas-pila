const list = document.querySelectorAll('.list')
const lists = document.querySelectorAll('.list');
const sections = document.querySelectorAll('.section');


function activeLink(){
  list.forEach((item)=>item.classList.remove('active'))
  
  this.classList.add('active')
}

list.forEach((item)=> item.addEventListener('click',activeLink))

lists.forEach((item) => {
    item.addEventListener('click', () => {
        
        lists.forEach((el) => el.classList.remove('active'));
        
        item.classList.add('active');

        sections.forEach((sec) => sec.classList.remove('active-section'));

        const target = item.getAttribute('data-target');
        document.getElementById(target).classList.add('active-section');
    });
});

document.querySelector('[data-target="re-form"]').addEventListener('click', () => {
    document.getElementById('re-main').style.display = 'none';  
    document.getElementById('re-form').style.display = 'block'; 
});


document.getElementById('back-register').addEventListener('click', () => {
    document.getElementById('re-form').style.display = 'none';  
    document.getElementById('re-main').style.display = 'block'; 
});


function enableBrand(answer){
    console.log(answer.value);
    if(answer.value == 'Disaster Affected'){
        document.getElementById('members').classList.remove('disaster')
    } else{
        document.getElementById('members').classList.add('disaster')
    }

    if(answer.value == 'Senior Citizen'){
        document.getElementById('senior').classList.remove('seniors')
    } else{
        document.getElementById('senior').classList.add('seniors')
    }

    if(answer.value == 'Medical Assistance'){
        document.getElementById('hospital').classList.remove('hospitals')
    } else{
        document.getElementById('hospital').classList.add('hospitals')
    }

     if(answer.value == 'Educational Assistance'){
        document.getElementById('education').classList.remove('educations')
    } else{
        document.getElementById('education').classList.add('educations')
    }
};


function searchID() {
    const id = document.getElementById("searchInput").value;

    if (!id) {
        alert("Please enter a Reference ID");
        return;
    }

   result.innerHTML = "<p>Searching...</p>";


    fetch("searching.php", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: "id=" + id
    })
    .then(response => response.json())
    .then(data => {
        const result = document.getElementById("result");

        if (!data.found) {
            result.innerHTML = `
                <p style="color:red;">❌ Reference ID not found.</p>
            `;
        } else {
            result.innerHTML = `
                <h3>✅ Application Found!</h3>
                <p><strong>Name:</strong> ${data.name}</p>
                <p><strong>Condition:</strong> ${data.condition}</p>
                <p><strong>Response:</strong> ${data.response}</p>
            `;
        }
         document.getElementById("searchInput").value = "";
    })
    .catch(error => {
        result.innerHTML = `<p style="color:red;">❌ Error: ${error.message}</p>`;
        console.error("Error:", error);
    });
}