// Add your custom JavaScript logic here

// Example: Fill Monthly Statistics Table
// function fillMonthlyStatistics() {
//     const monthlyStatisticsTable = document.querySelector('#monthlyStatistics tbody');

//     // Example Data (Replace this with your actual data)
//     const monthlyData = [
//         { month: 'January', totalReservations: 50 },
//         { month: 'February', totalReservations: 45 },
//         // Add more monthly data as needed
//     ];

//     // Clear existing rows
//     monthlyStatisticsTable.innerHTML = '';

//     // Populate the table
//     monthlyData.forEach(data => {
//         const row = document.createElement('tr');
//         row.innerHTML = `<td>${data.month}</td><td>${data.totalReservations}</td>`;
//         monthlyStatisticsTable.appendChild(row);
//     });
// }

// // Call the function to fill the table when the page loads
// fillMonthlyStatistics();

////////////////////////////////////////////////////////////////////////////////////////////////


const sidebarToggle = document.querySelector("#sidebar-toggle");
sidebarToggle.addEventListener("click",function(){
    document.querySelector("#sidebar").classList.toggle("collapsed");
});

document.querySelector(".theme-toggle").addEventListener("click",() => {
    toggleLocalStorage();
    toggleRootClass();
});

function toggleRootClass(){
    const current = document.documentElement.getAttribute('data-bs-theme');
    const inverted = current == 'dark' ? 'light' : 'dark';
    document.documentElement.setAttribute('data-bs-theme',inverted);
}

function toggleLocalStorage(){
    if(isLight()){
        localStorage.removeItem("light");
    }else{
        localStorage.setItem("light","set");
    }
}

function isLight(){
    return localStorage.getItem("light");
}

if(isLight()){
    toggleRootClass();
}



