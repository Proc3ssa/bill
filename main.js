const numOfApt = document.getElementById('numOfApts');


//get the id by "apartment_{number}"
const AptRow = (index) => {
    return `
        <td>
            <label for="apartment${index}">Apartment ${index}</label>
        </td>
        <td>
            <label>
            <input type="number" name="apartment${index}" id="apartment_${index}" required>
            </label>
        </td>
    `
}

// auto generate apartments based on number input
numOfApt.addEventListener('input', () => {
    if(isNaN(numOfApt.value)) return 0;
    const table = document.getElementById('mytable');

    //reset table
    table.innerHTML = ''

    // add row header
    const head = document.createElement('tr');
    head.innerHTML =
        `
        <tr>
            <th>Apartment</th>
            <th>No. of tenants</th>
        </tr>
        `;
    table.appendChild(head);

    for (let i = 1; i <= numOfApt.value; i++) {
        const row = document.createElement('tr')
        row.innerHTML = AptRow(i);
        table.appendChild(row);
    }
});