let expression = "";

function handleButtonClick(value) {
  expression += value;
  document.getElementById("result").value = expression;
}

function handleCalculate() {
  try {
    const result = eval(expression);
    document.getElementById("result").value = result;
    expression = String(result);
  } catch (error) {
    document.getElementById("result").value = "Error";
  }
}


function handleAC() {
  expression = "";
  document.getElementById("result").value = "";
}

function handleDE() {
  expression = expression.slice(0, -1);
  document.getElementById("result").value = expression;
}


function handlePowers() {
  const resultElement = document.getElementById("result");
  const currentResult = parseFloat(resultElement.value);

  if (!isNaN(currentResult)) {
    const resultSquared = Math.pow(currentResult, 2);
    expression = String(resultSquared);
    resultElement.value = expression;
  }
}

