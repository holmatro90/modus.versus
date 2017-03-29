/**
 * Created by Bogdan on 27.03.2017.
 */
// progressbar.js@1.0.0 version is used

var bar = new ProgressBar.SemiCircle(suspendisse, {
        strokeWidth: 12,
        color: '#ED6A5A',
        trailColor: '#77c8c1',
        trailWidth: 12,
        easing: 'easeInOut',
        duration: 1400,
        svgStyle: null,
        text: {
            value: '15',
            alignToBottom: false
        },
        from: {color: '#ED6A5A'},
        to: {color: '#ED6A5A'},
        // Set default step function for all animate calls
        step: (state, bar) => {
        bar.path.setAttribute('stroke', state.color);
var value = Math.round(bar.value() * 100);
if (value === 0) {
    bar.setText('');
} else {
    bar.setText(value);
}

bar.text.style.color = '#808d8d';
}
});
bar.text.style.fontFamily = '"Open Sans"';
bar.text.style.fontSize = '2rem';
bar.text.style.fontWeight = 'bold';

bar.animate(0.5);  // Number from 0.0 to 1.0


var bar = new ProgressBar.SemiCircle(maecenas, {
        strokeWidth: 12,
        color: '#ED6A5A',
        trailColor: '#77c8c1',
        trailWidth: 12,
        easing: 'easeInOut',
        duration: 1400,
        svgStyle: null,
        text: {
            value: '15',
            alignToBottom: false
        },
        from: {color: '#ED6A5A'},
        to: {color: '#ED6A5A'},
        // Set default step function for all animate calls
        step: (state, bar) => {
        bar.path.setAttribute('stroke', state.color);
var value = Math.round(bar.value() * 100);
if (value === 0) {
    bar.setText('');
} else {
    bar.setText(value);
}

bar.text.style.color = '#808d8d';
}
});
bar.text.style.fontFamily = '"Open Sans"';
bar.text.style.fontSize = '2rem';
bar.text.style.fontWeight = 'bold';

bar.animate(0.7);  // Number from 0.0 to 1.0


var bar = new ProgressBar.SemiCircle(aliquam, {
        strokeWidth: 12,
        color: '#ED6A5A',
        trailColor: '#77c8c1',
        trailWidth: 12,
        easing: 'easeInOut',
        duration: 1400,
        svgStyle: null,
        text: {
            value: '15',
            alignToBottom: false
        },
        from: {color: '#ED6A5A'},
        to: {color: '#ED6A5A'},
        // Set default step function for all animate calls
        step: (state, bar) => {
        bar.path.setAttribute('stroke', state.color);
var value = Math.round(bar.value() * 100);
if (value === 0) {
    bar.setText('');
} else {
    bar.setText(value);
}

bar.text.style.color = '#808d8d';
}
});
bar.text.style.fontFamily = '"Open Sans"';
bar.text.style.fontSize = '2rem';
bar.text.style.fontWeight = 'bold';

bar.animate(0.8);  // Number from 0.0 to 1.0


var bar = new ProgressBar.SemiCircle(habitasse, {
        strokeWidth: 12,
        color: '#ED6A5A',
        trailColor: '#77c8c1',
        trailWidth: 12,
        easing: 'easeInOut',
        duration: 1400,
        svgStyle: null,
        text: {
            value: '15',
            alignToBottom: false
        },
        from: {color: '#ED6A5A'},
        to: {color: '#ED6A5A'},
        // Set default step function for all animate calls
        step: (state, bar) => {
        bar.path.setAttribute('stroke', state.color);
var value = Math.round(bar.value() * 100);
if (value === 0) {
    bar.setText('');
} else {
    bar.setText(value);
}

bar.text.style.color = '#808d8d';
}
});
bar.text.style.fontFamily = '"Open Sans"';
bar.text.style.fontSize = '2rem';
bar.text.style.fontWeight = 'bold';

bar.animate(1.0);  // Number from 0.0 to 1.0