document.addEventListener("DOMContentLoaded", function() {
    const lookupBtn = document.getElementById("lookup");
    const result = document.getElementById("result");
    const citiesBtn = document.getElementById("lookup-cities");
    
    lookupBtn.addEventListener("click", function () {
        const country = document.getElementById("country").value;
        const xhr = new XMLHttpRequest();

        xhr.open("GET", "world.php?country=" + encodeURIComponent(country), true);

        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                result.innerHTML = xhr.responseText;
            }
        };
        xhr.send();
    });




    citiesBtn.addEventListener("click", function () {
        const country = document.getElementById("country").value;
        const xhr = new XMLHttpRequest();

        xhr.open("GET", "world.php?country=" + encodeURIComponent(country) + "&lookup=cities", true);

        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                result.innerHTML = xhr.responseText;
            }
        };
        xhr.send();
    })
});

