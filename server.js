function simpleHash(str) {
    let hash = 0;
    for (let i = 0; i < str.length; i++) {
        const charCode = str.charCodeAt(i);
        hash = (hash << 5) - hash + charCode;
        hash = hash & hash; // Convert to 32-bit integer
    }
    return hash;
}

const sentArr = [];
const myArray = [
    "DKDKDKAA704",
    "DKDKDKAA981",
    "DKDKDKAA780",
    "DKDKDKAC204",
    "DKDKDKAC575",
    "DKDKDKAA087",
    "DKDKDKAA770",
    "DKDKDKAA714",
    "DKDKDKAC542",
    "DKDKDKAC206",
    "DKDKDKAA293",
    "DKDKDKAA768",
    "DKDKDKAC148",
];

setInterval(function () {
    document.getElementById("btn-reload").click();

    const table = document.getElementById("data");
 

    const extractedData = [];

    if (table.rows.length > 3) {
        for (let i = 1; i < table.rows.length - 1; i++) {
            let row = table.rows[i];
            let rowData = [];

            let searchText = row.cells[4].textContent.trim();
            let indexOfSearchText = myArray.indexOf(searchText);

            if (indexOfSearchText !== -1) {
                for (j = 1; j < row.cells.length; j++) {
                    rowData.push(row.cells[j].textContent.trim());
                }

                let hashRowData = simpleHash(rowData.join(","));

                if (sentArr.includes(hashRowData) == false) {
                    sentArr.push(hashRowData);

                    extractedData.push(rowData);
                }
            }
        }
    }

    for (let i = extractedData.length - 1; i >= 0; i--) {
        if (extractedData[i] === null) {
            extractedData.splice(i, 1);
        }
    }

    if (extractedData) {
        fetch("http://127.0.0.1:8000/api/a", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify(extractedData),
        })
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json();
            })
            .then((data) => {
                console.log("Data sent to API successfully:", data);
            })
            .catch((error) => {
                console.error("Error sending data to API:", error);
            });
    }
}, 10000);
