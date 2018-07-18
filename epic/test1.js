
let arr = [1,2,3,4,5,6,];
console.log(arr);

function sumArray (currArr) {
	let sum = 0;
	for (let i = 0; i < currArr.length; i++ ) {
		sum += currArr[i];
		console.log(sum);
	}
	return sum;
}

console.log(sumArray(arr));

