import { shallow, createLocalVue,  mount,shallowMount } from '@vue/test-utils'

import Vue from 'vue'

import ProcurementTypeCreateEdit from '../../../../views/js/components/Admin/ProcurementType/ProcurementTypeCreateEdit.vue';

import moxios from 'moxios';

import * as extraLogics from "helpers/extraLogics";

import * as validation from "../../../../views/js/validator/procurementTypeSettings";

jest.mock('helpers/responseHandler')

describe('ProcurementTypeCreateEdit',() => {

	let wrapper;

	const updateWrapper = () =>{

		extraLogics.getIdFromUrl = () =>{return 1}

			wrapper = mount(ProcurementTypeCreateEdit,{

			stubs: ['text-field','custom-loader','alert'],

			mocks:{	lang:(string)=>string },

			methods : { 
				
				redirect : jest.fn()
			}
		})  
	}
	
	beforeEach(() => {
		 
		updateWrapper();

		moxios.install();

		moxios.stubRequest('/service-desk/api/procurement-mode/1',{
			
			status: 200,
			
			response: fakeResponse
		})
	})

	afterEach(() => {
		
		moxios.uninstall()
	})

	it('is vue instance',() => {		
		
		expect(wrapper.isVueInstance()).toBeTruthy()
	});

	it('makes an API call', (done) => {
		
		updateWrapper();
		
		wrapper.vm.getInitialValues(1);
		
		stubRequest();
		
		setTimeout(()=>{
		
			expect(moxios.requests.mostRecent().url).toBe('/service-desk/api/procurement-mode/1')
				
			expect(wrapper.vm.name).toEqual('test');
				
			done();
		
		},50)
	})

	it('updates `name` of the ProcurementType when onChange method is called with suitable parameters',()=>{

		wrapper.vm.onChange('test', 'name');

		expect(wrapper.vm.name).toBe('test');
	})

	it('makes an AJAX call when onSubmit method is called',(done)=>{

		updateWrapper()

		wrapper.setData({ loading : false, hasDataPopulated : true})

		wrapper.vm.isValid = () =>{return true}

		wrapper.vm.onSubmit()

		expect(wrapper.vm.loading).toBe(true)

		mockSubmitRequest();

		setTimeout(()=>{

			expect(moxios.requests.mostRecent().url).toBe('/service-desk/api/procurement-mode')

			expect(wrapper.vm.loading).toBe(false)

			done();
		},1);
	});

	it('makes an loading as false when onSubmit method return error',(done)=>{

		updateWrapper()

		wrapper.setData({ loading : false, hasDataPopulated : true,procurement_type_id : 1})

		wrapper.vm.isValid = () =>{return true}

		wrapper.vm.onSubmit()

		mockSubmitRequest(400);

		setTimeout(()=>{

			expect(wrapper.vm.loading).toBe(false)

			done();
		},1);
	});


	it("updates `title value when page is in edit`",()=>{
		
		updateWrapper()

		wrapper.vm.getValues('/10/edit');

		expect(wrapper.vm.$data.title).toEqual('edit-procurement')
	});

	it("makes `loading` as false if api returns error response",(done)=>{

		updateWrapper();

		updateWrapper();

		wrapper.vm.getInitialValues(1);

		stubRequest(400);

		setTimeout(()=>{

			expect(wrapper.vm.$data.loading).toBe(false)

			done();
		},50)
	})

	it('call `isValid` method when onSubmit method is called',(done)=>{

		updateWrapper()

		wrapper.setData({ loading : false, hasDataPopulated : true})

		wrapper.vm.isValid =jest.fn()   

		wrapper.vm.onSubmit()

		expect(wrapper.vm.isValid).toHaveBeenCalled()
	 
		done();
	});

	it('isValid - should return false ', done => {
				
		validation.validateProcurementTypeSettings = () =>{return {errors : [], isValid : false}}
			
		expect(wrapper.vm.isValid()).toBe(false)
			
		done()
	})

	it('isValid - should return true ', done => {
			 
		validation.validateProcurementTypeSettings = () =>{return {errors : [], isValid : true}}
			
		expect(wrapper.vm.isValid()).toBe(true)
			
		done()
	})

	function mockSubmitRequest(status = 200,url = '/service-desk/api/procurement-mode'){

		moxios.uninstall();

		moxios.install();

		moxios.stubRequest(url,{

			status: status,

			response: {'success':true,'message':'successfully saved'}
		})
	}

	function stubRequest(status = 200,url = '/service-desk/api/procurement-mode/1'){
		
		moxios.uninstall();
		
		moxios.install();
		
		moxios.stubRequest(url,{
			
			status: status,
			
			response : {
				data : {
					procurement_mode : {
						id : 1,
						name : 'test'
					}
				}
			}
		})
	}


	let fakeResponse = {
		success:true,
		data : {
			data : {
				procurement_mode : {
					name : 'test'
				}
			}
		}
	}
})