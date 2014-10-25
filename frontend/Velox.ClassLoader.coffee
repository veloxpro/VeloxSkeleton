window.Velox ?= {}

class Velox.ClassLoader
  _buffer: []
  _ticking: false
  _isFinished: false
  tickCount: 0

  constructor: ->
    $(document).find('head script').ready =>
      @.tick()
    $(document).ready =>
      @.tick()
      @.finish()

  load: (dependencies, func) ->
    if dependencies.length is 0
      func.call(window)
      return
    @._buffer.push
      dependencies: dependencies
      func: func
    if @._isFinished
      @.tick()
      if @._buffer.length isnt 0
        throw @.dumpBuffer()

  tick: ->
    if @._ticking
      return
    @._ticking = true

    @.tickCount = @.tickCount + 1
    if @.tickCount > 1000
      throw 'Velox ClassLoader: Too many ticks, looks like circulat references found.'

    for o in @._buffer
      for i, d of o.dependencies
        if @.isLoaded d
          o.dependencies = o.dependencies.splice i, -1

    nextTick = false
    for i, o of @._buffer
      if o.dependencies.length is 0
        nextTick = true
        @._buffer = @._buffer.splice i, -1
        o.func()

    @._ticking = false

    if nextTick
      @.tick()

  isLoaded: (className) ->
    parts = className.split '.'
    root = window
    for p in parts
      if root[p]?
        root = root[p]
      else
        return false
    return true

  finish: ->
    @._isFinished = true
    if @._buffer.length isnt 0
      throw @.dumpBuffer()

  dumpBuffer: (doLog = true) ->
    msg = 'Velox ClassLoader: Dependencies:'
    for o in @._buffer
      msg += '\n' + o.dependencies.join(', ')
    if (doLog)
      console.log msg
    return msg


Velox.classLoader = new Velox.ClassLoader()

Velox.require = (dependencies, func) ->
  if typeof dependencies is 'string'
    dependencies = [dependencies]
  Velox.classLoader.load dependencies, func
