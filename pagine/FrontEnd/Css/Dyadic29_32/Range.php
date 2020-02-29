
input[type='range'] {
    box-sizing: border-box;
    border: 0px solid transparent;
    padding: 0px;
    margin: 0px;
    width: 210px;
    height: 50px;
    cursor: pointer;
    background: -webkit-repeating-linear-gradient(90deg, #777, #777 1px, transparent 1px, transparent 40px) no-repeat 50% 50%;
        background: -moz-repeating-linear-gradient(90deg, #777, #777 1px, transparent 1px, transparent 40px) no-repeat 50% 50%;
            background: repeating-linear-gradient(90deg, #777, #777 1px, transparent 1px, transparent 40px) no-repeat 50% 50%;
                background-size: 122px 25px;
                font-size: 16px;
}
input[type='range'],
input[type='range']::-webkit-slider-runnable-track,
input[type='range']::-webkit-slider-thumb {
    -webkit-appearance: none;
}
input[type='range']::-webkit-slider-runnable-track {
    box-sizing: border-box;
    width: 200px;
    height: 5px;
    border-radius: 2px;
    background: #777;
}
input[type='range']::-moz-range-track {
    box-sizing: border-box;
    width: 200px;
    height: 5px;
    border-radius: 2px;
    padding: 0px;
    background: #777;
}
input[type='range']::-moz-range-thumb {
    box-sizing: border-box;
    padding: 0px;
    height: 20px;
    width: 10px;
    border-radius: 2px;
    border: 1px solid;
    background: #EEE;
}
input[type='range']::-ms-track {
    box-sizing: border-box;
    width: 210px;
    height: 5px;
    border-radius: 2px;
    padding: 0px;
    background: #777;
    color: #777;
}
input[type='range']::-webkit-slider-thumb {
    box-sizing: border-box;
    padding: 0px;
    height: 20px;
    width: 10px;
    border-radius: 2px;
    border: 1px solid;
    margin-top: -8px;
    background: #EEE;
}
input[type='range']::-ms-thumb {
    box-sizing: border-box;
    padding: 0px;
    height: 20px;
    width: 10px;
    border-radius: 2px;
    border: 1px solid;
    background: #EEE;
}
input[type="range"]::-ms-fill-lower {
    background: transparent;
}
input[type='range']:focus {
    outline: none;
}
/*input[type='range']:after{
 position: absolute;
 content: '20 40 60 80';
 padding: 25px 4035px;
 word-spacing: 20px;
 left: 0px;
 top: 0px;
 }*/

.container1:after {
    position: absolute;
    color: #777;
    content: '20 40 60 80';
    padding: 40px;
    word-spacing: 20px;
    left: 0px;
    top: 0px;
    z-index: -1;
}
.container1 {
    padding: 0px;
    position: relative;
}

