let data = {
    'keynote-1': {
        'index': 1,
        'date': '9/26(三)',
        'time': '10:30~11:15',
        'agenda': 'Driving Outdoor Industry Progress Through Collaboration',
        'speaker': 'Mr. David Ekelund<br>CEO, Icebug & Chairman of the board, Scandinavian Outdoor Group(瑞典)',
        'food': false,
        'checked': false,
    },
    'keynote-2': {
        'index': 2,
        'date': '9/26(三)',
        'time': '11:15~12:00',
        'agenda': 'Biotechnology Routes to Advanced Fibers in Textiles and Fabric Discovery in USA',
        'speaker': 'Dr. Melik Demirel<br>Full Professor, College of Engineering &Director, Center for Research on Advanced Fiber Technologies, Engineering Science and Mechanics, Pennsylvania State University (美國)',
        'food': true,
        'checked': false,
    },
    'keynote-3': {
        'index': 3,
        'date': '9/26(三)',
        'time': '13:30~14:15',
        'agenda': 'Building New Business Ecosystem Around Textile Recycling',
        'speaker': 'Dr. Pirjo Heikkilä<br>Senior Scientist, VTT Technical Research Centre of Finland Ltd(芬蘭)',
        'food': false,
        'checked': false,
    },
    'keynote-4': {
        'index': 4,
        'date': '9/26(三)',
        'time': '14:15~15:00',
        'agenda': 'Value Chain Transparency for Impact',
        'speaker': 'Mr. Jason Kibbey<br>CEO, Sustainable Apparel Coalition(美國)',
        'food': false,
        'checked': false,
    },
    'keynote-5': {
        'index': 5,
        'date': '9/26(三)',
        'time': '15:20~16:05',
        'agenda': 'Fibersort – Automated Sorting of Post Consumer Textiles for High Value Recycling',
        'speaker': 'Ms. Traci Kinden<br>Project Manager of Textiles Programme, Circular Economy(荷蘭)',
        'food': false,
        'checked': false,
    },
    'keynote-6': {
        'index': 6,
        'date': '9/27(四)',
        'time': '09:00~09:45',
        'agenda': 'Intelligent Functional Textiles Created by the Application of Macro-encapsulated Phase Change Material',
        'speaker': 'Dr. Barbara Pause<br>President of Textile Testing & Innovation, LLC (美國)',
        'food': false,
        'checked': false,
    },
    'keynote-7': {
        'index': 7,
        'date': '9/27(四)',
        'time': '09:45~10:30',
        'agenda': 'The Role of Conductive Fibres in Accelerating the Transformation of the Functional Fibre Industry',
        'speaker': 'Dr. Joselito Razal<br>Deputy Director of the Australian Research Council Research Hub for Future Fibres and an Associate Professor at the Institute for Frontier Materials, Deakin University (澳洲)',
        'food': false,
        'checked': false,
    },
    'keynote-8': {
        'index': 8,
        'date': '9/27(四)',
        'time': '10:45~11:30',
        'agenda': 'Nanotechnology, a Key Enabling Technology to Functional and Smart Textiles',
        'speaker': 'Mr. Braz Costa<br>CEO, Center for Nanotechnology and Smart Materials (葡萄牙)',
        'food': true,
        'checked': false,
    },
    'keynote-9': {
        'index': 9,
        'date': '9/27(四)',
        'time': '14:15~15:00',
        'agenda': 'Canada’s Wearables Industry: Challenges and Opportunities',
        'speaker': 'Mr. Peter Kallai<br>CEO, intelliFLEX (加拿大)',
        'food': false,
        'checked': false,
    },
    'keynote-10': {
        'index': 10,
        'date': '9/27(四)',
        'time': '14:15~15:00',
        'agenda': 'Smart Textiles: Disrupting the Textiles Industry and Beyond',
        'speaker': 'Mr. Ben Cooper<br>Managing Director, IoClothes (美國)',
        'food': false,
        'checked': false,
    },
    'keynote-11': {
        'index': 11,
        'date': '9/27(四)',
        'time': '15:20~16:05',
        'agenda': 'Taking E-Textiles From Concept to Mass Production – How IPC International Standards for E-Textiles Will Reduce Costs, Accelerate Innovation and Improve Reliability',
        'speaker': 'Mr. Chris Jorgensen<br>Director of Technology Transfer, IPC-Association Connecting Electronics Industries (美國)',
        'food': false,
        'checked': false,
    }
};

let foodList = {
    0: {
        'name': '不需要',
        'class': 'btn btn-outline-primary btn-sm',
    },
    1: {
        'name': '葷食',
        'class': 'btn btn-outline-danger btn-sm',
    },
    2: {
        'name': '素食',
        'class': 'btn btn-outline-success btn-sm',
    },
};

let list = {};
let confirmList = {};
let total = 0;
let food = 0;

function selectKeynote(e) {
    let checkBox = $(e.target);
    let domId = checkBox.parents('.keynote').attr('id').replace('step1', 'step2');
    let id = domId.replace('step2-', '');

    if (checkBox.is(':checked')) {
        list[data[id]['index']] = checkBox.parents('.keynote').clone();
        list[data[id]['index']].attr('id', domId);
        data[id]['checked'] = true;
        total += 1;
        food += data[id]['food'] ? 1 : 0;

        confirmList[data[id]['index']] = list[data[id]['index']].clone();
    } else {
        list[data[id]['index']].remove();
        delete list[data[id]['index']];
        data[id]['checked'] = false;
        total += -1;
        food += data[id]['food'] ? -1 : 0;

        confirmList[data[id]['index']].remove();
        delete confirmList[data[id]['index']];
    }

    $('.chosen-keynote-number').text(total);
    $('.chosen-food-number').text(food);

    refreshKeynoteFood();
    refreshKeynoteConfirm();
}

function refreshKeynote() {
    let root = $('.keynote');
    let rows = {};
    for (let i = 0; i < 11; i++) {
        let row = root.clone();
        let key = 'keynote-' + (i + 1);
        row.attr('id', 'keynote-step1-' + (i + 1));
        row.find('.column-index').html(data[key]['index']);
        row.find('.column-date').html(data[key]['date']);
        row.find('.column-time').html(data[key]['time']);
        row.find('.column-agenda').html(data[key]['agenda']);
        row.find('.column-speaker').html(data[key]['speaker']);
        rows[i] = row;
        row.insertBefore(root);
    }
    root.remove();
}

function refreshKeynoteFood() {
    let root = $('.keynote-food');
    for (let k = 1; k <= 11; k++) {
        if (list[k] != null) {
            list[k].insertBefore(root);
            if (data['keynote-' + k]['food']) {
                if (data['keynote-' + k]['foodChosen'] === undefined) {
                    data['keynote-' + k]['foodChosen'] = 0;
                }

                list[k].find('.column-select').html("<button id=\"" +
                    'btn-foodChosen-keynote-' + k + "\" type=\"button\">" + foodList[data['keynote-' + k]['foodChosen']]['name'] + "</button>");

                let target = $('#' + 'btn-foodChosen-keynote-' + k);

                target.removeClass().addClass(foodList[data['keynote-' + k]['foodChosen']]['class']).on('click', function (e) {
                    data['keynote-' + k]['foodChosen'] += 1;
                    data['keynote-' + k]['foodChosen'] %= 3;
                    let v = data['keynote-' + k]['foodChosen'];
                    if (v === 0) {
                        // 不需要
                        target.text('不需要');
                        target.removeClass();
                        target.addClass('btn btn-outline-primary btn-sm');
                    } else if (v === 1) {
                        // 葷食
                        target.text('葷食');
                        target.removeClass();
                        target.addClass('btn btn-outline-danger btn-sm');
                    } else if (v === 2) {
                        // 素食
                        target.text('素食');
                        target.removeClass();
                        target.addClass('btn btn-outline-success btn-sm');
                    }

                    refreshKeynoteConfirm();
                });
            } else {
                list[k].find('.column-select').html('不提供');
            }
        }
    }
}

function refreshKeynoteConfirm() {
    let root = $('.keynote-confirm');
    for (let k = 1; k <= 11; k++) {
        if (confirmList[k] != null) {
            confirmList[k].insertBefore(root);
            if (data['keynote-' + k]['food']) {
                let v = data['keynote-' + k]['foodChosen'];
                let text = '';
                let color = '';
                if (v === 0) {
                    // 不需要
                    text = '不需要';
                    color = '#1d68a7';
                } else if (v === 1) {
                    // 葷食
                    text = '葷食';
                    color = '#e3342f';
                } else if (v === 2) {
                    // 素食
                    text = '素食';
                    color = '#2d995b';
                }
                confirmList[k].find('.column-select').html(text).css('color', color);
            } else {
                confirmList[k].find('.column-select').html('X');
            }
        }
    }
}

$(document).ready(function () {
    // $('.close').on('click', function () {
    //     auth.waiting(false);
    // });
    //
    // $('#form-').on('submit', function (e) {
    //     // 停用預設的遞送表單，預設的會導致頁面刷新
    //     e.preventDefault();
    //     // disabled的欄位無法使用jquery serialize函式，故需要先儲存表單資訊
    //     let data = $('#form-updatePassword').serialize();
    //     auth.waiting();
    //     // 使用ajax遞送表單，避免頁面刷新
    //     auth.ajax('POST', '/profile/updatePassword', data);
    // });
    $('.indicator .btn').on('click', function (e) {
        let id = e.target.id;
        $('.indicator .btn').removeClass('active');
        $('#' + id).addClass('active');

        let tab_id = id.replace('btn-', '');
        $('.step').css('display', 'none');
        $('#' + tab_id).css('display', 'block');
    });

    $('#btn-step1').trigger('click');

    refreshKeynote();

    $('input.select').on('click', selectKeynote);
});
