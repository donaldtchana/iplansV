const newcourrier = document.querySelector("[data-newcourrier]");
const modal = document.querySelector("[data-modal]");
const close = document.querySelector("[data-close]");
const range = document.querySelector("[data-range]");
const select = document.querySelectorAll("[data-select]");
const reset = document.querySelector("[data-reset]");
const upload = document.querySelector("[data-upload]");
const removeAll = document.querySelector("[data-removeAll]");
const addPiece = document.querySelector("[data-addPiece]");
const removePiece = document.querySelector("[data-removePiece]");
const entrant = document.querySelector(".entrant");
const Rupload = document.querySelector("[data-Rupload]");
const rowInfoTemplate = document.querySelector("[data-template-row-info]");
const tableBody = document.querySelector("[data-tbody]");

newcourrier.addEventListener("click", () => modal.classList.add("open"));
close.addEventListener("click", () => modal.classList?.remove("open"));
window.addEventListener("keydown", (e) => {
  if (e.key === "Escape" && modal.classList.contains("open")) {
    modal.classList?.remove("open");
  }
});

function addBorderRadius() {
  const borr = entrant.clientWidth * 0.025 + "px";
  entrant.style.borderRadius = borr;
  entrant.nextElementSibling.style.borderRadius = borr;
}

window.addEventListener("resize", addBorderRadius);
addBorderRadius();

range.addEventListener("change", adjustSelectedOption);
reset.addEventListener("click", () => {
  removeAll.click();
});
function adjustSelectedOption(event) {
  const val = parseInt(event.target.value);
  const a = val / 5;
  select.forEach((element) => element.removeAttribute("checked"));
  select[4 - a].setAttribute("checked", "checked");
}
upload.addEventListener("click", function () {
  Rupload.click();
});

Rupload.addEventListener("change", function () {
  const files = this.files;

  for (let i = 0; i < files.length; i++) {
    const filename = files[i].name;
    const size = (files[i].size / 1024).toFixed(2);
    const fileExtension = filename.lastIndexOf(".");
    let type;
    fileExtension !== -1
      ? (type = filename.substring(fileExtension, filename.length))
      : undefined;
    type = type?.split(".").pop().toUpperCase();
    updateTable(
      type ?? "???",
      filename,
      size >= 1024 ? (size / 1024).toFixed(2) + " MB" : size + " KB"
    );
  }
});

removeAll.addEventListener("click", () => {
  tableBody.innerHTML = "";
  Rupload.value = "";
});

addPiece.addEventListener("click", () => Rupload.click());

removePiece.addEventListener("click", () => {
  tableBody.removeChild(tableBody.lastChild);
});

/**
 * Append rows to the table containing information about each file.
 * @param {string} type file type
 * @param {string} doc_name file name
 * @param {string} size file size
 */
function updateTable(type, doc_name, size) {
  const element = rowInfoTemplate.content.cloneNode(true);
  setValue("type", type, { parent: element });
  setValue("doc-name", doc_name, { parent: element });
  setValue("size", size, { parent: element });
  tableBody.appendChild(element);
}

function setValue(input, value, { parent = document } = {}) {
  parent.querySelector(`[data-${input}]`).textContent = value;
}
window.addEventListener("DOMContentLoaded", () => {
  const date = new Date();
  const year = date.getFullYear();
  const month = date.getMonth() + 1;
  const day = date.getDate();
  const hour = date.getHours();
  const minute = date.getMinutes();

  let mm, dd, hh, mins;

  mm = month < 10 ? "0" + month : "" + month;
  dd = day < 10 ? "0" + day : "" + day;
  hh = hour < 10 ? "0" + hour : "" + hour;
  mins = minute < 10 ? "0" + minute : "" + minute;

  modal.querySelector("#date").value = `${year}-${mm}-${dd}`;
  modal.querySelector("#heure").value = `${hh}:${mins}`;
});
