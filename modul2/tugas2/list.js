var idContent = 0;

document.querySelector('#add').onclick = function() {
    if (document.querySelector('#area1').value.length == 0) {
        alert('INPUT GABOLE KOSONG');
    } else {
        var text = document.querySelector('#area1').value;
        var content = document.querySelector('#bts');
        var newc = `<div class="content" id="content-${idContent}">
                        <input type="text" disabled class="area2" id="area2-${idContent}" value="${text}">  <br><br>
                        <div class="tombol col">
                            <a class="pen" href="#" onclick="edit(${idContent})">
                                <img src="img/pen.png" alt="pen">
                            </a>
                            <a class="trash" href="#" onclick="deleted(${idContent})">
                                <img src="img/trash.png" alt="trash">
                            </a>
                            <a class="check" href="#" onclick="save(${idContent})">
                                <img src="img/check.png" alt="check">
                            </a>
                        </div>
                    </div>`;

        idContent += 1;
        content.innerHTML += newc;
        document.querySelector('#area1').value = ''; 
    }
};

function deleted(id) {
    const element = document.getElementById(`content-${id}`);
    element.remove();
}

function edit(id) {
    var area2 = document.getElementById(`area2-${id}`);
    area2.disabled = false;
}

function save(id) {
    var newvalue = document.getElementById(`area2-${id}`).value;
    var area2 = document.getElementById(`area2-${id}`);
    area2.disabled = true;
    area2.setAttribute("value", newvalue);

}

