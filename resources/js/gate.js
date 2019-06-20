export default class Gate {
  constructor (user) {
    this.user = user
  }

  isAdministrator () {
    return this.user.role === 'admin'
  }

  isNational () {
    if (this.user.role === 'national' || this.user.role === 'admin') {
      return true
    }
  }

  isQLD () {
    if (
      this.user.role === 'qld_manager' ||
      this.user.role === 'qld_standard' ||
      this.user.role === 'admin'
    ) {
      return true
    }
  }

  isQLDManager () {
    if (this.user.role === 'qld_manager' || this.user.role === 'admin') {
      return true
    }
  }

  isQLDStandard () {
    if (this.user.role === 'qld_standard' || this.user.role === 'admin') {
      return true
    }
  }

  isNSW () {
    if (
      this.user.role === 'nsw_manager' ||
      this.user.role === 'nsw_standard' ||
      this.user.role === 'admin'
    ) {
      return true
    }
  }

  isNSWManager () {
    if (this.user.role === 'nsw_manager' || this.user.role === 'admin') {
      return true
    }
  }

  isNSWStandard () {
    if (this.user.role === 'nsw_standard' || this.user.role === 'admin') {
      return true
    }
  }

  isVIC () {
    if (
      this.user.role === 'vic_manager' ||
      this.user.role === 'vic_standard' ||
      this.user.role === 'admin'
    ) {
      return true
    }
  }

  isVICManager () {
    if (this.user.role === 'vic_manager' || this.user.role === 'admin') {
      return true
    }
  }

  isVICStandard () {
    if (this.user.role === 'vic_standard' || this.user.role === 'admin') {
      return true
    }
  }

  isSA () {
    if (
      this.user.role === 'sa_manager' ||
      this.user.role === 'sa_standard' ||
      this.user.role === 'admin'
    ) {
      return true
    }
  }

  isSAManager () {
    if (this.user.role === 'sa_manager' || this.user.role === 'admin') {
      return true
    }
  }

  isSAStandard () {
    if (this.user.role === 'sa_standard' || this.user.role === 'admin') {
      return true
    }
  }
}
