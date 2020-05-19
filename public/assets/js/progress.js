function progressBar(canvas,span,percentage){
	canvas.addEventListener('circleProgressBar.afterDraw', function (e) {
         span.innerText = (e.detail.self.getValue() * 100).toFixed(0) + '%';
     }, false);
     canvas.addEventListener('circleProgressBar.afterFrameDraw', function (e) {
         var currentValue = (e.detail.self.getValue() * e.detail.progress * 100).toFixed(0) + '%';
         var currentSpanValue = span.innerText;
         if (currentSpanValue != currentValue) {
             span.innerText = currentValue;
         }
     }, false);
     var rainbowColors = ['#9400D3', '#4B0082', '#0000FF', '#00FF00', '#FFFF00'];
     var colors = ['#12b4c8','#6669e6', '#6669e6'];
     var circleProgressBar = new CircleProgressBar(canvas, {colors: colors});
     circleProgressBar.setValue(percentage);  
}      
