document.addEventListener("keyup", function (e) {
    if (!e.target.closest("[data-table-search]")) {
        return;
    };

    let filterValue, id, table, trs, trsLength;
    const target = e.target;
    filterValue = target.value.toLowerCase();
    id = target.dataset.tableSearch;
    table = document.querySelector(`#${id}`);
    trs = table.querySelectorAll(`tr`);
    trsLength = trs.length;
    for (let i = 1; i < trsLength; i++) {
        let tr = trs[i];
        let tds = tr.querySelectorAll("td");

        let filter = false;
        tds.forEach((td) => {

            let tdValue = td.textContent || td.innerText;
            if (tdValue.toLowerCase().indexOf(filterValue) > -1) {
                filter = true;
                return;
            }
        });
        if (!filter) {
            tr.style.display = 'none';
        } else {
            tr.style.display = "";
        }
    }
});
