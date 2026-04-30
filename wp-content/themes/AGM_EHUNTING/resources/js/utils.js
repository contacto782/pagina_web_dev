const isMobile = {
  Android() {
    return navigator.userAgent.match(/Android/i);
  },
  BlackBerry() {
    return navigator.userAgent.match(/BlackBerry/i);
  },
  iOS() {
    return navigator.userAgent.match(/iPhone|iPad|iPod/i);
  },
  Opera() {
    return navigator.userAgent.match(/Opera Mini/i);
  },
  Windows() {
    return navigator.userAgent.match(/IEMobile/i);
  },
  any() {
    return this.Android() || this.BlackBerry() || this.iOS() || this.Opera() || this.Windows();
  },
};

const INVALID_MESSAGES = {
  email: "debe ser valido",
  tel: "debe ser valido",
  phone: "debe ser valido",
  letters: "debe contener solo letras",
  numbers: "debe contener solo numeros",
  checkbox: "debe ser seleccionado",
};

const showFieldError = (fieldName, message) => {
  utilities.showToast(`El campo ${fieldName} ${message}`, 3000);
};

const validarForm = ($form) => {
  let valid = true;
  Array.from($form.elements).some((e) => {
    const dataType = e.dataset.type;
    const dataTitle = e.dataset.title !== undefined ? e.dataset.title : e.name;

    if (e.required && utilities.isEmpty(e.value)) {
      showFieldError(dataTitle, "no debe estar vacio");
      valid = false;
      return true;
    }

    if (dataType !== undefined) {
      if (e.required && dataType === "letters" && !utilities.isString(e.value)) {
        showFieldError(dataTitle, INVALID_MESSAGES.letters);
        valid = false;
        return true;
      }
      if (e.required && dataType === "email" && !utilities.isValidEmail(e.value)) {
        showFieldError(dataTitle, INVALID_MESSAGES.email);
        valid = false;
        return true;
      }
      if (e.required && dataType === "phone" && !utilities.isValidNumber(e.value)) {
        showFieldError(dataTitle, INVALID_MESSAGES.phone);
        valid = false;
        return true;
      }
      if (e.required && dataType === "numbers" && isNaN(e.value)) {
        showFieldError(dataTitle, INVALID_MESSAGES.numbers);
        valid = false;
        return true;
      }
      if (e.required && dataType === "rut" && !utilities.checkRut(e)) {
        valid = false;
        return true;
      }
    } else {
      if (e.type === "email" && !utilities.isValidEmail(e.value) && e.required) {
        showFieldError(dataTitle, INVALID_MESSAGES.email);
        valid = false;
        return true;
      }
      if (e.type === "tel" && !utilities.isValidNumber(e.value) && e.required) {
        showFieldError(dataTitle, INVALID_MESSAGES.tel);
        valid = false;
        return true;
      }
      if (e.type === "checkbox" && !e.checked && e.required) {
        showFieldError(dataTitle, INVALID_MESSAGES.checkbox);
        valid = false;
        return true;
      }
    }
  });

  return valid;
};

const utilities = {
  showToast($msg, $time) {
    M.toast({
      html: $msg,
      displayLength: $time,
      classes: isMobile.any() ? "" : "rounded",
    });
  },
  isEmpty(str) {
    return !str || str.length === 0;
  },
  isString(str) {
    return /^[a-zA-Zá-úÁ-Úñ ]+$/.test(str);
  },
  letters(str) {
    return /^[a-zA-Zá-úÁ-Úñ ]+$/.test(str);
  },
  isValidEmail(email) {
    return /^[a-zA-Z0-9_\-\.~]{2,}@[a-zA-Z0-9_\-\.~]{2,}\.[a-zA-Z]{2,4}$/.test(email);
  },
  isValidNumber(number) {
    if (isNaN(number)) {
      return false;
    }

    if (number.length < 8 || number.length > 12) {
      return false;
    }

    return /((\d{11})|(\+)(\d{11})|(\d{8}))/.test(number);
  },
  formatPrice: (price) => {
    const newPrice = price.indexOf(".") > 0 ? price.split(".") : price;
    const precio = newPrice[0] !== undefined ? newPrice[0] : newPrice;
    let format = "";
    let dot = 1;
    for (let i = precio.length; i > 0; i--) {
      const e = precio.charAt(i - 1);
      format = e.concat(format);
      if (dot % 3 === 0) {
        format = ".".concat(format);
        dot = 1;
        continue;
      }
      dot++;
    }
    return format.charAt(0) === "."
      ? format.substring(1, format.length).concat(newPrice[1] !== undefined ? `,${newPrice[1]}` : "")
      : format.concat(newPrice[1] !== undefined ? `,${newPrice[1]}` : "");
  },
};

export { isMobile, validarForm, utilities };
