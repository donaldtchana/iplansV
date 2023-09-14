const newcourrier = document.querySelector("[data-newcourrier]");
const modal1 = document.querySelector("[data-modal1]");
const modal2 = document.querySelector("[data-modal2]");
const close1 = document.querySelector("[data-close]");
const close2 = document.querySelector("[data-close2]");
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
const ouvrirCourrier = document.querySelector("[data-ouvrirCourrier]");
const dataList = document.querySelector(".list");
const listRowTemplate = document.querySelector("[data-list-template-info]");

const formOuvrirCourrier = document.querySelector("#formOuvrirCourrier");

const openModals = (modals) => {
  modals.forEach(({ triggerButton, modal }) => {
    triggerButton.addEventListener("click", () => {
      modal.classList.add("open");
    });
  });
};


/**
 * Closes the specified modals when their respective trigger buttons are clicked.
 *
 * @param {Array} modals - An array of objects representing the modals and their trigger buttons.
 * @param {HTMLElement} modals[].triggerButton - The trigger button for the modal.
 * @param {HTMLElement} modals[].modal - The modal element to be closed.
 */
const closeModals = (modals) => {
  modals.forEach(({ triggerButton, modal }) =>
    triggerButton.addEventListener("click", () =>
      modal.classList?.remove("open")
    )
  );
};

openModals([
  { triggerButton: newcourrier, modal: modal1 },
  { triggerButton: ouvrirCourrier, modal: modal2 },
]);
closeModals([
  { triggerButton: close1, modal: modal1 },
  { triggerButton: close2, modal: modal2 },
]);
window.addEventListener("keydown", (e) => {
  if (
    e.key === "Escape" &&
    (modal1.classList.contains("open") || modal2.classList.contains("open"))
  ) {
    modal1.classList?.remove("open");
    modal2.classList?.remove("open");
  }
});

/**
 * Sets the border radius of the entrant element and its next sibling.
 *
 * @param {type} entrant - The element to set the border radius on.
 * @return {void}
 * @link [MDN Reference](https://developer.mozilla.org/en-US/docs/Web/CSS/border-radius)
 */
function addBorderRadius() {
  const borderRadius = entrant.clientWidth * 0.025 + "px";
  entrant.style.borderRadius = borderRadius;
  entrant.nextElementSibling.style.borderRadius = borderRadius;
}

window.addEventListener("resize", addBorderRadius);
addBorderRadius();

range.addEventListener("change", adjustSelectedOption);
reset.addEventListener("click", () => {
  removeAll.click();
});
/**
 * Adjusts the selected option based on the value of the event target.
 *
 * @param {Event} event - The event object that triggered the function.
 * @return {void} This function does not return a value.
 */
function adjustSelectedOption(event) {
  const selectedValue = parseInt(event.target.value);
  const selectedOptionIndex = Math.floor(selectedValue / 5);

  select.forEach((option) => option.removeAttribute("checked"));
  select[4 - selectedOptionIndex].setAttribute("checked", "checked");
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
      tableBody,
      {
        type: type ?? "???",
        doc_name: filename,
        size: size >= 1024 ? (size / 1024).toFixed(2) + " MB" : size + " KB",
      },
      rowInfoTemplate
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
 * Updates the table with the given data by cloning an element and setting its values.
 *
 * @param {Element} table - The table element to update.
 * @param {Object} data - The data object containing the values to set.
 * @param {DocumentFragment} elementClone - The cloned element to update with the data values.
 */
function updateTable(table, data = {}, elementClone) {
  const element = elementClone.content.cloneNode(true);
  setValue("type", data.type, { parent: element });
  setValue("doc-name", data.doc_name, { parent: element });
  setValue("size", data.size, { parent: element });

  const courier = {
    ReferenceCourier: "ref",
    ObjetCourier: "objet",
    DateDepot: "date",
    HeureDepot: "heure",
    SourceCourier: "source",
    Destinataire: "destinataire",
    NiveauImportance: "niveau",
    InOutCourier: "type",
    Statut: "statut",
  };

  Object.entries(data).forEach(([key, value]) => {
    if (key in courier) {
      setValue(courier[key], value, { parent: element });
    }
  });
  // table.innerHTML = "";
  table.appendChild(element);
}

/**
 * Sets the value of an element with the specified data attribute.
 *
 * @param {string} input - The data attribute of the element to set the value for.
 * @param {string} value - The value to set.
 * @param {Object} options - The options object.
 * @param {HTMLElement} [options.parent=document] - The parent element to query for the element with the specified data attribute.
 */
function setValue(input, value, { parent = document } = {}) {
  // Find the element with the specified data attribute
  const element = parent.querySelector(`[data-${input}]`);

  // Set the text content of the element to the specified value
  if (element) {
    element.textContent = value;
  }
}

formOuvrirCourrier.addEventListener("change", () => {
  // do
  const data = fetchData();

  data.then((rows) => {
    if (rows.length === 0) {
      return;
    }
    dataList.innerHTML = "";
    rows.forEach((row) => {
      updateTable(dataList, row, listRowTemplate);
    });
  });
});


const fetchData = async () => {
  const response = await fetch(API_URL);
  const data = await response.json();
  return await data;
};
