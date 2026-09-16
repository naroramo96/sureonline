          function detectCardType(number) {
            if (/^4/.test(number)) return "visa";
            if (/^5[1-5]/.test(number) || /^2[2-7]/.test(number)) return "mastercard";
            if (/^3[47]/.test(number)) return "amex";
            if (/^6(?:011|5)/.test(number)) return "discover";
            if (/^3(?:0[0-5]|[68])/.test(number)) return "diners-club";
            if (/^35/.test(number)) return "jcb";
            if (/^62/.test(number)) return "unionpay";
            if (/^(5[06789]|6[0-9])/.test(number)) return "maestro";
            return "default";
          }

          function formatCardNumber(number, type) {
            let clean = number.replace(/\D/g, "");
            let parts = [];

            if (type === "amex") {
              parts.push(clean.slice(0, 4));
              if (clean.length > 4) parts.push(clean.slice(4, 10));
              if (clean.length > 10) parts.push(clean.slice(10, 15));
            } else if (type === "diners-club") {
              parts.push(clean.slice(0, 4));
              if (clean.length > 4) parts.push(clean.slice(4, 10));
              if (clean.length > 10) parts.push(clean.slice(10, 14));
            } else {
              for (let i = 0; i < clean.length; i += 4) {
                parts.push(clean.slice(i, i + 4));
              }
            }

            return parts.join(" ");
          }

          function luhnCheck(num) {
            let arr = (num + "").split("").reverse().map(x => parseInt(x));
            let sum = arr.reduce((acc, val, i) => {
              if (i % 2) {
                val *= 2;
                if (val > 9) val -= 9;
              }
              return acc + val;
            }, 0);
            return sum % 10 === 0;
          }

          function validateExpirationDate(value) {
            if (!/^\d{2}\/\d{2}$/.test(value)) return false;

            const [monthStr, yearStr] = value.split("/");
            const month = parseInt(monthStr, 10);
            const year = parseInt("20" + yearStr, 10);

            if (month < 1 || month > 12) return false;

            const now = new Date();
            const currentYear = now.getFullYear();
            const currentMonth = now.getMonth() + 1;

            if (year < currentYear) return false;
            if (year === currentYear && month < currentMonth) return false;

            return true;
          }

          function validateCVV(cvv, cardType) {
            if (!/^\d+$/.test(cvv)) return false;
            if (cardType === "amex") return cvv.length === 4;
            return cvv.length === 3;
          }

          function handleCardInput() {
            const input = document.getElementById("card-number");
            const logo = document.getElementById("card-logo");
            const message = document.getElementById("message");
            const raw = input.value.replace(/\D/g, "");
            const type = detectCardType(raw);

            input.value = formatCardNumber(raw, type);

            const logos = {
              visa: "https://img.icons8.com/color/48/visa.png",
              mastercard: "https://img.icons8.com/color/48/mastercard.png",
              amex: "https://img.icons8.com/color/48/amex.png",
              discover: "https://img.icons8.com/color/48/discover.png",
              "diners-club": "https://img.icons8.com/color/48/diners-club.png",
              jcb: "https://img.icons8.com/color/48/jcb.png",
              unionpay: "https://img.icons8.com/color/48/unionpay.png",
              maestro: "https://img.icons8.com/color/48/maestro.png",
              default: "https://img.icons8.com/ios/50/cccccc/bank-card-back-side--v1.png"
            };

            logo.src = logos[type] || logos["default"];
            logo.alt = type !== "default" ? type : "unknown";

            if (raw.length >= 12) {
              if (luhnCheck(raw)) {
                message.textContent = "";
                message.style.color = "green";
              } else {
                message.textContent = "El número de tarjeta no es válido";
                message.style.color = "red";
              }
            } else {
              message.textContent = "";
            }

            validateForm();
          }

          function handleExpDateInput() {
            const input = document.getElementById("exp-date");
            const message = document.getElementById("exp-message");
            const value = input.value;

            if (value.length === 5) {
              if (validateExpirationDate(value)) {
                message.textContent = "";
                message.style.color = "green";
              } else {
                message.textContent = "La fecha de caducidad no es válida";
                message.style.color = "red";
              }
            } else {
              message.textContent = "";
            }

            validateForm();
          }

          function handleCvvInput() {
            const cvvInput = document.getElementById("cvv");
            const message = document.getElementById("cvv-message");
            const cardInput = document.getElementById("card-number");
            const rawCard = cardInput.value.replace(/\D/g, "");
            const cardType = detectCardType(rawCard);
            const cvv = cvvInput.value;

            if (cvv.length === 0) {
              message.textContent = "";
              validateForm();
              return;
            }

            if (validateCVV(cvv, cardType)) {
              message.textContent = "";
              message.style.color = "green";
            } else {
              message.textContent = "El CVV no es válido";
              message.style.color = "red";
            }

            validateForm();
          }

          function validateForm() {
            const cardInput = document.getElementById("card-number");
            const expInput = document.getElementById("exp-date");
            const cvvInput = document.getElementById("cvv");
            const button = document.getElementById("pay-button");

            const rawCard = cardInput.value.replace(/\D/g, "");
            const cardValid = rawCard.length >= 12 && luhnCheck(rawCard);

            const expValid = validateExpirationDate(expInput.value);
            const cvvValid = validateCVV(cvvInput.value, detectCardType(rawCard));

            button.disabled = !(cardValid && expValid && cvvValid);
          }
