var data = {
    'keynote-1': {
        'date': '9/26(三)',
        'time': '10:30~11:15',
        'agenda': 'Driving Outdoor Industry Progress Through Collaboration',
        'speaker': 'Mr. David Ekelund<br>CEO, Icebug & Chairman of the board, Scandinavian Outdoor Group(瑞典)',
        'food': false,

    },
    'keynote-2': {
        'date': '9/26(三)',
        'time': '11:15~12:00',
        'agenda': 'Biotechnology Routes to Advanced Fibers in Textiles and Fabric Discovery in USA',
        'speaker': 'Dr. Melik Demirel<br>Full Professor, College of Engineering &Director, Center for Research on Advanced Fiber Technologies, Engineering Science and Mechanics, Pennsylvania State University (美國)',
        'food': true,
    },
    'keynote-3': {
        'date': '9/26(三)',
        'time': '13:30~14:15',
        'agenda': 'Building New Business Ecosystem Around Textile Recycling',
        'speaker': 'Dr. Pirjo Heikkilä<br>Senior Scientist, VTT Technical Research Centre of Finland Ltd(芬蘭)',
        'food': false,
    },
    'keynote-4': {
        'date': '9/26(三)',
        'time': '14:15~15:00',
        'agenda': 'Value Chain Transparency for Impact',
        'speaker': 'Mr. Jason Kibbey<br>CEO, Sustainable Apparel Coalition(美國)',
        'food': false,
    },
    'keynote-5': {
        'date': '9/26(三)',
        'time': '15:20~16:05',
        'agenda': 'Fibersort – Automated Sorting of Post Consumer Textiles for High Value Recycling',
        'speaker': 'Ms. Traci Kinden<br>Project Manager of Textiles Programme, Circular Economy(荷蘭)',
        'food': false,
    },
    'keynote-6': {
        'date': '9/27(四)',
        'time': '09:00~09:45',
        'agenda': 'Intelligent Functional Textiles Created by the Application of Macro-encapsulated Phase Change Material',
        'speaker': 'Dr. Barbara Pause<br>President of Textile Testing & Innovation, LLC (美國)',
        'food': false,
    },
    'keynote-7': {
        'date': '9/27(四)',
        'time': '09:45~10:30',
        'agenda': 'The Role of Conductive Fibres in Accelerating the Transformation of the Functional Fibre Industry',
        'speaker': 'Dr. Joselito Razal<br>Deputy Director of the Australian Research Council Research Hub for Future Fibres and an Associate Professor at the Institute for Frontier Materials, Deakin University (澳洲)',
        'food': false,
    },
    'keynote-8': {
        'date': '9/27(四)',
        'time': '10:45~11:30',
        'agenda': 'Nanotechnology, a Key Enabling Technology to Functional and Smart Textiles',
        'speaker': 'Mr. Braz Costa<br>CEO, Center for Nanotechnology and Smart Materials (葡萄牙)',
        'food': true,
    },
    'keynote-9': {
        'date': '9/27(四)',
        'time': '14:15~15:00',
        'agenda': 'Canada’s Wearables Industry: Challenges and Opportunities',
        'speaker': 'Mr. Peter Kallai<br>CEO, intelliFLEX (加拿大)',
        'food': false,
    },
    'keynote-10': {
        'date': '9/27(四)',
        'time': '14:15~15:00',
        'agenda': 'Smart Textiles: Disrupting the Textiles Industry and Beyond',
        'speaker': 'Mr. Ben Cooper<br>Managing Director, IoClothes (美國)',
        'food': false,
    },
    'keynote-11': {
        'date': '9/27(四)',
        'time': '15:20~16:05',
        'agenda': 'Taking E-Textiles From Concept to Mass Production – How IPC International Standards for E-Textiles Will Reduce Costs, Accelerate Innovation and Improve Reliability',
        'speaker': 'Mr. Chris Jorgensen<br>Director of Technology Transfer, IPC-Association Connecting Electronics Industries (美國)',
        'food': false,
    }
};

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

    let root = $('.keynote');
    let rows = {};
    for (let i = 0; i < 11; i++) {
        let row = root.clone();
        let key = 'keynote-' + (i + 1);
        row.addClass(key);
        row.find('.column-date').html(data[key]['date']);
        row.find('.column-time').html(data[key]['time']);
        row.find('.column-agenda').html(data[key]['agenda']);
        row.find('.column-speaker').html(data[key]['speaker']);
        rows[i] = row;
        row.insertBefore(root);
    }
    root.remove();

    $('#btn-step1').addClass('active');

    $('.indicator .btn').on('click', function (e) {
        let id = e.target.id;
        $('.indicator .btn').removeClass('active');
        $('#' + id).addClass('active');

        let tab_id = id.replace('btn-', '');
        $('.step').css('display', 'none');
        $('#' + tab_id).css('display', 'block');
    });

    let total = 0;
    let food = 0;

    $('input.checkBox').on('click', function () {
        console.log(this);
    });
});
