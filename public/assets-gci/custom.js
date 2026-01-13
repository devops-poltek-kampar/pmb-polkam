$(function () {
    $(".select2").select2({
        placeholder: "Pilih",
        allowClear: true,
    });
});

Number.prototype.rupiah = function rupiah() {
    return "Rp " + (this + "").replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
};
