$(document).ready(function() {
    let currentInput = '';
    
    // Button click event
    $('.button').click(function() {
      const value = $(this).data('value');
      console.log(value);
      
      // If it's the equal button
      if (value === '=') {
        try {
          currentInput = eval(currentInput).toString();  // Evaluate the expression
        } catch (e) {
          currentInput = 'Error';
        }
      }
      // If it's the clear button
      else if (value === 'C') {
        currentInput = '';
      }
      // Else, append the value to the current input
      else {
        currentInput += value;
      }
      
      $('#display').val(currentInput);  // Update the display
    });
  });
  