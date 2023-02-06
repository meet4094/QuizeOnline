// sample calendar events data
'use strict'
var curYear = moment().format('YYYY');
var curMonth = moment().format('MM');
// Calendar Event Source
var azCalendarEvents = {
	id: 1,
	events: [{
		id: '2',
		start: curYear + '-' + curMonth + '-10T09:00:00',
		end: curYear + '-' + curMonth + '-10T17:00:00',
		title: 'Design Review',
		backgroundColor: '#d5ffff',
		borderColor: '#00cccc',
		description: 'In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis az pede mollis...'
	}]
};
// Birthday Events Source
var azBirthdayEvents = {
	id: 2,
	backgroundColor: '#cbfbb0',
	borderColor: '#3bb001',
	events: [{
		id: '6',
		start: curYear + '-' + curMonth + '-23T15:00:00',
		end: curYear + '-' + curMonth + '-23T21:00:00',
		title: 'Pauline\'s Birthday',
		description: 'In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis az pede mollis...'
	}]
};
var azHolidayEvents = {
	id: 3,
	backgroundColor: '#fbbfdc',
	borderColor: '#f10075',
	events: [{
		id: '8',
		start: curYear + '-' + curMonth + '-28',
		end: curYear + '-' + curMonth + '-29',
		title: 'Veteran\'s Day'
	}]
};
var azOtherEvents = {
	id: 4,
	backgroundColor: '#ffecca',
	borderColor: '#ffb52b',
	events: [{
		id: '13',
		start: curYear + '-' + curMonth + '-29',
		end: curYear + '-' + curMonth + '-31',
		title: 'My Rest Day'
	}]
};