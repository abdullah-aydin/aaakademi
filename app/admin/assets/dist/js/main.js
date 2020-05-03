$(document).ready(function () {

    //      BOOK ADD SECTION
    $('#addBook').on('click', function () {
        Swal.mixin({
            input: 'text',
            showCancelButton: true,
            progressSteps: ['1', '2'],
            confirmButtonText: 'İleri &rarr;',
            cancelButtonText: 'İptal &#10540;',
            cancelButtonColor: 'red',
        }).queue([
            {
                title: 'Kitap Adı',
                text: 'Kaydetmek istediğiniz kitabın adını giriniz;',
                input: 'text',
                inputPlaceholder: 'Kitap adını giriniz. (örn: Uçurtma Avcısı)',
                inputValidator: (value) => {
                    return new Promise((resolve) => {
                        if (value) {
                            resolve()
                        } else {
                            resolve('Herhangi bir kitap adı girmediniz.')
                        }
                    })
                },
            },
            {
                title: 'Kitap Sayfası',
                text: 'Kaydetmek istediğiniz kitabın sayfa sayısını giriniz;',
                input: 'number',
                inputPlaceholder: 'Sayfa sayısı',
                inputValidator: (value) => {
                    return new Promise((resolve) => {
                        if (value) {
                            resolve()
                        } else {
                            resolve('Sayfa sayısını girmediniz.')
                        }
                    })
                },
            }
        ]).then((result) => {
            if (result.value) {

                const bookName = result.value[0];
                const bookPages = result.value[1];

                Swal.fire({
                    title: 'Neredeyse bitti!',
                    html: `<i>Aşağıdaki kitabı eklemek istediğinize emin misiniz?</i><br><br><br>
                    Kitap Adı: <b>${bookName}</b> <br><br>
                    Sayfa Sayısı: <b>${bookPages}</b> `,
                    confirmButtonText: 'Kitabı Ekle &rarr;',
                    cancelButtonText: 'Vazgeç &#10540;',
                    confirmButtonColor: 'green',
                    showCancelButton: true,
                    cancelButtonColor: 'red',
                    preConfirm: () => {
                        $.ajax({
                            type: "POST",
                            url: bookUrlApi,
                            cache: false,
                            data: {'bookName': bookName, 'bookPages': bookPages},
                            success: function (response) {
                                var response = JSON.parse(response);
                                var book_id = response.id;
                                var book_name = response.book_name;
                                var book_init_date = response.book_init_date;
                                var book_total_reads = response.book_total_reads;
                                var book_total_pages = response.book_total_pages;
                                var percentage = parseInt((book_total_reads / book_total_pages) * 100);

                                $('#active_book_tbody').append("<tr id=\"active_book_" + book_id + "\">\n" +
                                    "                                <td class=\"index\">\n" +
                                    "                                    \n" +
                                    "                                </td>\n" +
                                    "                                <td class=\"book_name\">\n" +
                                    "                                    <a>\n" +
                                    "                                        " + book_name + "\n" +
                                    "                                    </a>\n" +
                                    "                                    <br>\n" +
                                    "                                    <small>\n" +
                                    "                                        <small>\n" +
                                    "                                            <i>" + book_init_date + "</i>\n" +
                                    "                                        </small>\n" +
                                    "                                    </small>\n" +
                                    "                                </td>\n" +
                                    "                                <td id=\"book_progress_" + book_id + "\" class=\"book_progress\">\n" +
                                    "                                    <div class=\"progress progress-sm\">\n" +
                                    "                                        <div class=\"progress-bar bg-yellow\" role=\"progressbar\"\n" +
                                    "                                             aria-volumenow=\"" + percentage + "\"\n" +
                                    "                                             aria-volumemin=\"0\" aria-volumemax=\"100\"\n" +
                                    "                                             style=\"width: " + percentage + "%\">\n" +
                                    "                                        </div>\n" +
                                    "                                    </div>\n" +
                                    "                                    <small>\n" +
                                    "                                        " + percentage + "% okundu\n" +
                                    "                                    </small>&nbsp;&nbsp;&nbsp;\n" +
                                    "                                    <small>\n" +
                                    "                                        (" + 0 + "/" + book_total_pages + ") \n" +
                                    "                                    </small>\n" +
                                    "                                </td>\n" +
                                    "                                <td class=\"align-middle\">\n" +
                                    "                                    <div class=\"d-flex justify-content-end\">\n" +
                                    "                                        <a class=\"btn btn-info btn-sm mr-1\"\n" +
                                    "                                           href=\"" + editBookUrl + book_id + "\">\n" +
                                    "                                            <i class=\"fas fa-eye\"></i>\n" +
                                    "                                        </a>\n" +
                                    "                                        <button class=\"btn  btn-danger btn-sm\" onclick=\"deleteBook(" + book_id + ", this)\">\n" +
                                    "                                            <i class=\"fas fa-trash\"></i>\n" +
                                    "                                        </button>\n" +
                                    "                                    </div>\n" +
                                    "                                </td>\n" +
                                    "                            </tr>")
                            }
                        }, 'json');
                    }
                })
            }
        })
    });
    //   /. BOOK ADD SECTION


    //      PAGE ADD SECTION
    $('#addPage').on('click', function () {
        var selectedBook;
        var extraction;

        $.ajax({
            type: "POST",
            url: bookUrlApi,
            cache: false,
            data: {'activeBooks': "1"},
            success: function (result) {
                var books = JSON.parse(result);
                var books_value = {};
                $.map(books, function (n) {
                    books_value[n.id] = n.book_name;
                });


                Swal.mixin({
                    input: 'text',
                    showCancelButton: true,
                    progressSteps: ['1', '2'],
                    confirmButtonText: 'İleri &rarr;',
                    cancelButtonText: 'İptal &#10540;',
                    cancelButtonColor: 'red',
                }).queue([{
                    title: 'Kitap Adı',
                    text: 'Sayfa eklemek istediğiniz kitabı aşağıdan seçiniz.',
                    input: 'select',
                    inputPlaceholder: 'Kitap Seçiniz',
                    inputValidator: (value) => {
                        return new Promise((resolve) => {
                            if (value) {
                                resolve()
                            } else {
                                resolve('Kitap seçimi yapmadan ilerleyemezsiniz.')
                            }
                        })
                    },
                    inputOptions: books_value,
                    preConfirm: (value) => {

                        books.forEach(function (item) {
                            if (value == item.id) {
                                selectedBook = item;
                            }
                        })

                        var bookTotalReads;
                        if (selectedBook.books_total_reads == null) {
                            bookTotalReads = 0
                        } else {
                            bookTotalReads = parseInt(selectedBook.books_total_reads);
                        }
                        var bookTotalPages = parseInt(selectedBook.book_total_pages);
                        extraction = (bookTotalPages - bookTotalReads);


                    },
                },
                    {
                        title: 'Okunan Sayfa Sayısı',
                        text: 'Kaç sayfa okudunuz?',
                        input: 'number',
                        inputPlaceholder: 'Sayfa Sayısı',
                        inputAttributes: {
                            min: 1,
                        },
                        inputValidator: (value) => {
                            return new Promise((resolve) => {
                                if (value) {
                                    if (value <= 0) {
                                        resolve('0 veya daha küçük bir değer giremezsin.')
                                    } else if (value > extraction) {
                                        resolve('Yavaş Gel! ' + extraction + ' sayfadan az olsun')
                                    } else {
                                        resolve()
                                    }
                                } else {
                                    resolve('Sayfa sayısı boş bırakılamaz.')
                                }
                            })
                        }
                    }
                ]).then((result) => {
                    if (result.value) {
                        const bookName = books_value[result.value[0]];
                        const bookPages = result.value[1];

                        Swal.fire({
                            title: 'Neredeyse bitti!',
                            html: `<i>${bookName} adlı kitabı ${bookPages} sayfa okudunuz mu?</i><br><br><br>
                                Kitap Adı: <b>${bookName}</b> <br>
                                Okunan Sayfa: <b>${bookPages}</b> `,
                            confirmButtonText: 'Sayfa Ekle &rarr;',
                            cancelButtonText: 'Vazgeç &#10540;',
                            confirmButtonColor: 'green',
                            showCancelButton: true,
                            cancelButtonColor: 'red',
                            preConfirm: () => {
                                $.ajax({
                                    type: "POST",
                                    url: bookUrlApi,
                                    cache: false,
                                    data: {
                                        'bookId': result.value[0],
                                        'bookReadPages': bookPages,
                                        'bookAddPages': true
                                    },
                                    success: function (response) {
                                        var response = JSON.parse(response);
                                        console.log(response);
                                        var book_id = response.id;
                                        var book_name = response.book_name;
                                        var book_init_date = response.book_init_date;
                                        var book_total_reads = parseInt(response.book_total_reads);
                                        var book_total_pages = parseInt(response.book_total_pages);
                                        var percentage = parseInt((book_total_reads / book_total_pages) * 100);

                                        $('#book_progress_' + book_id).replaceWith("" +
                                            "<td id=\"book_progress_" + book_id + "\" class=\"book_progress\">\n" +
                                            "   <div class=\"progress progress-sm\">\n" +
                                            "       <div class=\"progress-bar bg-yellow\" role=\"progressbar\"\n" +
                                            "           aria-volumenow=\"" + (book_total_reads) + "\"\n" +
                                            "           aria-volumemin=\"0\" aria-volumemax=\"100\"\n" +
                                            "           style=\"width: " + percentage + "%\">\n" +
                                            "       </div>\n" +
                                            "   </div>\n" +
                                            "   <small>\n" +
                                            "       " + percentage + "% okundu\n" +
                                            "   </small>\n" +
                                            "   &nbsp;&nbsp;&nbsp;\n" +
                                            "   <small>\n" +
                                            "       (" + book_total_reads + "/" + book_total_pages + ")\n" +
                                            "   </small>\n" +
                                            "</td>")

                                        if (book_total_reads >= book_total_pages) {

                                            $.ajax({
                                                type: "POST",
                                                url: bookUrlApi,
                                                cache: false,
                                                data: {'bookCompleted': "1", 'bookId': book_id},
                                                success: () => {

                                                    $('#completed_book_tbody').append("<tr id=\"completed_book_" + book_id + "\">\n" +
                                                        "                                <td class=\"index\">\n" +
                                                        "                                    \n" +
                                                        "                                </td>\n" +
                                                        "                                <td class=\"book_name\">\n" +
                                                        "                                    <a>\n" +
                                                        "                                        " + book_name + "\n" +
                                                        "                                    </a>\n" +
                                                        "                                    <br>\n" +
                                                        "                                    <small>\n" +
                                                        "                                        <small>\n" +
                                                        "                                            <i>" + book_init_date + "</i>\n" +
                                                        "                                        </small>\n" +
                                                        "                                    </small>\n" +
                                                        "                                </td>\n" +
                                                        "                                <td id=\"book_progress_" + book_id + "\" class=\"book_progress\">\n" +
                                                        "                                    <div class=\"progress progress-sm\">\n" +
                                                        "                                        <div class=\"progress-bar bg-green\" role=\"progressbar\"\n" +
                                                        "                                             aria-volumenow=\"" + percentage + "\"\n" +
                                                        "                                             aria-volumemin=\"0\" aria-volumemax=\"100\"\n" +
                                                        "                                             style=\"width: " + percentage + "%\">\n" +
                                                        "                                        </div>\n" +
                                                        "                                    </div>\n" +
                                                        "                                    <small>\n" +
                                                        "                                        " + percentage + "% \n" +
                                                        "                                    </small>\n" +
                                                        "                                    <small>\n" +
                                                        "                                        (" + book_total_pages + " sayfa) \n" +
                                                        "                                    </small>\n" +
                                                        "                                </td>\n" +
                                                        "                                <td class=\"align-middle\">\n" +
                                                        "                                    <div class=\"d-flex justify-content-end\">\n" +
                                                        "                                        <a class=\"btn btn-info btn-sm mr-1\"\n" +
                                                        "                                           href=\"" + editBookUrl + book_id + "\">\n" +
                                                        "                                            <i class=\"fas fa-eye\"></i>\n" +
                                                        "                                        </a>\n" +
                                                        "                                        <button class=\"btn  btn-danger btn-sm\" onclick=\"deleteBook(" + book_id + ",this)\">\n" +
                                                        "                                            <i class=\"fas fa-trash\"></i>\n" +
                                                        "                                        </button>\n" +
                                                        "                                    </div>\n" +
                                                        "                                </td>\n" +
                                                        "                            </tr>");
                                                    $('#active_book_' + book_id).remove();

                                                }
                                            });


                                        }
                                    },

                                }, 'json');
                            }
                        })

                    }
                })
            }
        });
    });
    //   /. PAGE ADD SECTION

    //      QUESTİON TARGET ADD SECTION
    $("#addQuestionTarget").on("click", function () {

        $.ajax({
            type: "POST",
            url: targetsUrlApi,
            cache: false,
            data: {'activeLessons': "1"},
            success: function (result) {
                console.log(result);
                var lessons = JSON.parse(result);

                var lessons_value = {};
                $.map(lessons, function (value, key) {
                    lessons_value[key] = value;
                });
                console.log(lessons_value);
                Swal.mixin({
                    input: 'text',
                    showCancelButton: true,
                    progressSteps: ['1', '2'],
                    confirmButtonText: 'İleri &rarr;',
                    cancelButtonText: 'İptal &#10540;',
                    cancelButtonColor: 'red',
                }).queue([{
                    title: 'Soru Hedefi',
                    text: 'Hedef belirlemek istediğiniz dersi seçiniz.',
                    input: 'select',
                    inputPlaceholder: 'Ders Seçiniz',
                    inputValidator: (value) => {
                        return new Promise((resolve) => {
                            if (value) {
                                    resolve()
                            } else {
                                resolve('Herhangi bir değer seçmediniz.')
                            }
                        })
                    },
                    inputOptions: lessons_value
                },
                    {
                        title: 'Hedef Soru Sayısı',
                        text: 'Hedefinizin soru sayısını belirtiniz.',
                        input: 'number',
                        inputPlaceholder: 'Soru Sayısı',
                        inputValidator: (value) => {
                            return new Promise((resolve) => {
                                if (value) {
                                    if (value <= 10) {
                                        resolve('10 veya daha küçük bir değer giremezsiniz.')
                                    } else {
                                        resolve()
                                    }
                                } else {
                                    resolve('Herhangi bir ders seçmediniz.')
                                }
                            })
                        }
                    }
                ]).then((result) => {
                    if (result.value) {
                        const lessonName = result.value[0]
                        const questionTarget = result.value[1]
                        Swal.fire({
                            title: 'Neredeyse bitti!',
                            html: `<i>Aşağıdaki hedefi eklemek istediğinize emin misiniz?</i><br><br><br>
                            Ders Adı: <b>${lessons_value[lessonName]}</b> <br>
                            Soru Sayısı: <b>${questionTarget}</b> `,
                            confirmButtonText: 'Kitabı Ekle &rarr;',
                            cancelButtonText: 'Vazgeç &#10540;',
                            confirmButtonColor: 'green',
                            showCancelButton: true,
                            cancelButtonColor: 'red',
                            preConfirm: () => {
                                $.ajax({
                                    type: "POST",
                                    url: targetsUrlApi,
                                    cache: false,
                                    data: {'lessonName': lessonName, 'questionTarget': questionTarget},
                                    success: function (response) {
                                        var response = JSON.parse(response);
                                        var question_target_id = response.id;
                                        var lesson_name = response.lesson_name;
                                        var question_target = response.target;
                                        var question_target_init_date = response.init_date;


                                        $('#question_target_tbody').append("<tr id=\"question_target_"+question_target_id+"\">\n" +
                                            "                            <td class=\"p-2\"></td>\n" +
                                            "                            <td><a>"+lessons_value[lessonName]+" dersinden "+question_target+" soru</a><br /><small>"+question_target_init_date+"</small></td>\n" +
                                            "                            <td class=\"project_progress\">\n" +
                                            "                                <div class=\"progress progress-sm\">\n" +
                                            "                                    <div class=\"progress-bar bg-yellow\" role=\"progressbar\" aria-volumenow=\"0\"\n" +
                                            "                                         aria-volumemin=\"0\" aria-volumemax=\"100\" style=\"width: 0%\">\n" +
                                            "                                    </div>\n" +
                                            "                                </div>\n" +
                                            "                                <small>Hedef başarı süreciniz</small><small> (0/"+question_target+")</small>\n" +
                                            "                            </td>\n" +
                                            "                            <td class=\"align-middle\">\n" +
                                            "                                <div class=\"d-flex justify-content-end\">\n" +
                                            "                                    <button class=\"btn  btn-danger btn-sm\" onclick=\"deleteQuestionTarget(" + question_target_id + ",this)\">\n" +
                                            "                                        <i class=\"fas fa-trash\"></i>\n" +
                                            "                                    </button>\n" +
                                            "                                </div>\n" +
                                            "                            </td>\n" +
                                            "                        </tr>")
                                    }
                                }, 'json');
                            }
                        })
                    }
                })


            }
        })
    });
    //   /. QUESTİON TARGET ADD SECTION


    //      BOOK TARGET ADD SECTION
    $("#addBookTarget").on("click", function () {
        Swal.mixin({
            input: 'text',
            showCancelButton: true,
            progressSteps: ['1'],
            confirmButtonText: 'İleri &rarr;',
            cancelButtonText: 'İptal &#10540;',
            cancelButtonColor: 'red',
        }).queue([
            {
                title: 'Hedef Sayfa Sayısı',
                text: 'Günlük kaç sayfa kitap okuma hedefi koymak istiyorsunuz?',
                input: 'number',
                inputPlaceholder: 'Sayfa Sayısı',
                inputValidator: (value) => {
                    return new Promise((resolve) => {
                        if (value) {
                            if (value<=10){
                                resolve('10 veya daha küçük bir değer giremezsiniz')
                            } else {
                                resolve()
                            }
                        } else {
                            resolve('Herhangi bir değer seçmediniz.')
                        }
                    })
                }
            }
        ]).then((result) => {
            if (result.value) {
                const sayfaSayisi = result.value[0]
                Swal.fire({
                    title: 'Neredeyse bitti!',
                    html: `<i>Aşağıdaki hedefi eklemek istediğinize emin misiniz?</i><br><br><br>
                    Sayfa Sayısı: <b>${sayfaSayisi}</b> `,
                    confirmButtonText: 'Hedefi Ekle &rarr;',
                    cancelButtonText: 'Vazgeç &#10540;',
                    confirmButtonColor: 'green',
                    showCancelButton: true,
                    cancelButtonColor: 'red',
                    preConfirm: () => {
                        $.ajax({
                            type: "POST",
                            url: targetsUrlApi,
                            cache: false,
                            data: {'bookTarget': sayfaSayisi},
                            success: function (response) {
                                var response = JSON.parse(response);
                                var book_target_id = response.id;
                                var book_target = response.target;
                                var book_target_init_date = response.init_date;


                                $('#book_targets_tbody').append("<tr id=\"book_target_" + book_target_id + "\">\n" +
                                    "                            <td class=\"p-2\">1</td>\n" +
                                    "                            <td><a>Günlük kitap okuma hedefiniz " + book_target + " sayfa</a><br /><small>" + book_target_init_date + "</small></td>\n" +
                                    "                            <td class=\"project_progress\">\n" +
                                    "                                <div class=\"progress progress-sm\">\n" +
                                    "                                    <div class=\"progress-bar bg-yellow\" role=\"progressbar\" aria-volumenow=\"0\"\n" +
                                    "                                         aria-volumemin=\"0\" aria-volumemax=\"100\" style=\"width: 0%\">\n" +
                                    "                                    </div>\n" +
                                    "                                </div>\n" +
                                    "                                <small>Hedef başarı süreciniz</small><small> (0/" + book_target + ")</small>\n" +
                                    "                            </td>\n" +
                                    "                            <td class=\"align-middle\">\n" +
                                    "                                <div class=\"d-flex justify-content-end\">\n" +
                                    "                                    <button class=\"btn  btn-danger btn-sm\" onclick=\"deleteBookTarget(" + book_target_id + ",this)\">\n" +
                                    "                                        <i class=\"fas fa-trash\"></i>\n" +
                                    "                                    </button>\n" +
                                    "                                </div>\n" +
                                    "                            </td>\n" +
                                    "                        </tr>")
                            }

                        }, 'json')
                    }
                })
            }})});
    //   /. BOOK TARGET ADD SECTION


});

function deleteBook(_id, table_row) {
    // $(table_row).parents('tbody').addClass('certain_class');
    // var c = $(table_row).parents('tbody').children()
// for (i = 0; i < c.length; i++) {
//     console.log($($(c[i])[0]).find('td:first').text(i+1))
// }


    event.preventDefault();
    Swal.fire({
        title: 'Kitabı silmek istediğine emin misin?',
        text: "Eğer silersen bi daha geri alaman!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Vazgeç &#10540;',
        confirmButtonText: 'Evet, Sil! &rarr;'
    }).then((result) => {
        console.log(result);
        if (result.value) {
            $.ajax({
                type: "POST",
                url: bookUrlApi,
                cache: false,
                data: {'bookDelete': 1, 'bookId': _id},
                success: (result) => {
                    if (result) {
                        Swal.fire(
                            'Silindi!',
                            'Başarıyla sildin.',
                            'success'
                        )
                        $(table_row).parents('tr').remove();

                        // for(i=0;i<c.length ; i++){
                        //     $($(c[i])[0]).find('td:first').text(i+1)
                        // }
                    } else {
                        Swal.fire(
                            'Hata!',
                            'Kitap silinirken bir hata oluştu',
                            'error'
                        )
                    }

                }
            });


        }
    })
}

function deleteTrial(_id, table_row) {
    // $(table_row).parents('tbody').addClass('certain_class');
    // var c = $(table_row).parents('tbody').children()
// for (i = 0; i < c.length; i++) {
//     console.log($($(c[i])[0]).find('td:first').text(i+1))
// }


    event.preventDefault();
    Swal.fire({
        title: 'Denemeyi silmek istediğine emin misin?',
        text: "Eğer silersen bi daha geri alaman!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Vazgeç &#10540;',
        confirmButtonText: 'Evet, Sil! &rarr;'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                type: "POST",
                url: deleteTrialApi,
                cache: false,
                data: {'trialDelete': 1, 'trialId': _id},
                success: (result) => {
                    if (result) {
                        Swal.fire(
                            'Silindi!',
                            'Başarıyla sildin.',
                            'success'
                        )
                        $(table_row).parents('tr').remove();

                        // for(i=0;i<c.length ; i++){
                        //     $($(c[i])[0]).find('td:first').text(i+1)
                        // }
                    } else {
                        Swal.fire(
                            'Hata!',
                            'Deneme silinirken bir hata oluştu',
                            'error'
                        )
                    }

                }
            });


        }
    })
}

function deleteQuestionTarget(_id, table_row) {
    // $(table_row).parents('tbody').addClass('certain_class');
    // var c = $(table_row).parents('tbody').children()
// for (i = 0; i < c.length; i++) {
//     console.log($($(c[i])[0]).find('td:first').text(i+1))
// }


    event.preventDefault();
    Swal.fire({
        title: 'Bu hedefi silmek istediğine emin misin?',
        text: "Eğer silersen bi daha geri alaman!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Vazgeç &#10540;',
        confirmButtonText: 'Evet, Sil! &rarr;'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                type: "POST",
                url: targetsUrlApi,
                cache: false,
                data: {'deleteQuestionTarget': 1, 'questionTargetId': _id},
                success: (result) => {
                    if (result) {
                        Swal.fire(
                            'Silindi!',
                            'Başarıyla sildin.',
                            'success'
                        )
                        $(table_row).parents('tr').remove();

                        // for(i=0;i<c.length ; i++){
                        //     $($(c[i])[0]).find('td:first').text(i+1)
                        // }
                    } else {
                        Swal.fire(
                            'Hata!',
                            'Deneme silinirken bir hata oluştu',
                            'error'
                        )
                    }

                }
            });


        }
    })
}

function deleteBookTarget(_id, table_row) {
    // $(table_row).parents('tbody').addClass('certain_class');
    // var c = $(table_row).parents('tbody').children()
// for (i = 0; i < c.length; i++) {
//     console.log($($(c[i])[0]).find('td:first').text(i+1))
// }


    event.preventDefault();
    Swal.fire({
        title: 'Bu hedefi silmek istediğine emin misin?',
        text: "Eğer silersen bi daha geri alaman!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Vazgeç &#10540;',
        confirmButtonText: 'Evet, Sil! &rarr;'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                type: "POST",
                url: targetsUrlApi,
                cache: false,
                data: {'deleteBookTarget': 1, 'questionBookId': _id},
                success: (result) => {
                    if (result) {
                        Swal.fire(
                            'Silindi!',
                            'Başarıyla sildin.',
                            'success'
                        )
                        $(table_row).parents('tr').remove();

                        // for(i=0;i<c.length ; i++){
                        //     $($(c[i])[0]).find('td:first').text(i+1)
                        // }
                    } else {
                        Swal.fire(
                            'Hata!',
                            'Deneme silinirken bir hata oluştu',
                            'error'
                        )
                    }

                }
            });


        }
    })
}