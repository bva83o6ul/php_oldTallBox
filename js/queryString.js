function queryString(data){
    var arr = []; //用数组存储k=v对
     for(var k in data){
        //arr.push(k+"="+data[k]);
        arr.push(k+"="+encodeURIComponent(data[k])); //循环遍历，存储到数组中
     }
     return arr.join('&'); //用&符号分割字符串
}