Velox.require 'Velox.Framework.Mvc.BaseController', =>
  window.Demo ?= {}
  window.Demo.App ?= {}
  window.Demo.App.Controller ?= {}

  class Demo.App.Controller.Index extends Velox.Framework.Mvc.BaseController
    indexAction: () ->
      console.log 'VeloxStack Skeleton App. Demo.'
