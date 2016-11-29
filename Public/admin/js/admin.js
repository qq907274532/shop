function throwExc(msg) {
    layer.msg(msg, {
        icon: 5,
        time: 800 //2秒关闭（如果不配置，默认是3秒）
    });
}

function showSucc(msg) {
    layer.msg(msg, {
        icon: 6,
        time: 800 //2秒关闭（如果不配置，默认是3秒）
    });
}